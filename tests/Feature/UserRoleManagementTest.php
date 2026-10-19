<?php

use App\Filament\Resources\Users\Pages\CreateUser;
use App\Filament\Resources\Users\Pages\EditUser;
use App\Models\User;
use Filament\Forms\Components\Select;
use Livewire\Livewire;

beforeEach(function () {
    $this->admin = User::firstOrCreate(
        ['email' => 'admin-user-mgmt@test.com'],
        ['name' => 'Admin Test', 'role' => User::ROLE_ADMIN, 'password' => bcrypt('password')]
    );
    $this->admin->update(['role' => User::ROLE_ADMIN]);

    $this->pengasuhUser = User::firstOrCreate(
        ['email' => 'pengasuh-mgmt-test@test.com'],
        ['name' => 'Pengasuh Mgmt Test', 'role' => User::ROLE_PENGASUH, 'password' => bcrypt('password')]
    );
});

afterEach(function () {
    User::whereIn('email', [
        'newuser-test@test.com',
        'pengasuh-mgmt-test@test.com',
        'admin-user-mgmt@test.com',
    ])->delete();
});

test('pilihan hak akses saat tambah user tidak menyertakan admin', function () {
    $this->actingAs($this->admin);

    Livewire::test(CreateUser::class)
        ->assertFormFieldExists('role', checkFieldUsing: function (Select $field): bool {
            $options = $field->getOptions();

            return ! array_key_exists(User::ROLE_ADMIN, $options)
                && array_key_exists(User::ROLE_KEPALA_PANTI, $options)
                && array_key_exists(User::ROLE_PENGURUS, $options)
                && array_key_exists(User::ROLE_PENGASUH, $options);
        });
});

test('bisa membuat user baru dengan peran selain admin', function () {
    $this->actingAs($this->admin);

    Livewire::test(CreateUser::class)
        ->fillForm([
            'name' => 'Pengguna Baru Test',
            'email' => 'newuser-test@test.com',
            'password' => 'password123',
            'role' => User::ROLE_PENGASUH,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    expect(User::where('email', 'newuser-test@test.com')->where('role', User::ROLE_PENGASUH)->exists())->toBeTrue();
});

test('saat edit user admin pilihan role admin tetap tersedia agar tidak hilang', function () {
    $this->actingAs($this->admin);

    Livewire::test(EditUser::class, ['record' => $this->admin->id])
        ->assertFormFieldExists('role', checkFieldUsing: function (Select $field): bool {
            $options = $field->getOptions();

            return array_key_exists(User::ROLE_ADMIN, $options);
        });
});
