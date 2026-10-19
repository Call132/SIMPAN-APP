<?php

use App\Filament\Resources\Penguruses\Pages\CreatePengurus;
use App\Filament\Resources\Penguruses\Pages\EditPengurus;
use App\Models\Pengurus;
use App\Models\User;
use Database\Seeders\PengurusSeeder;
use Livewire\Livewire;

beforeEach(function () {
    $this->admin = User::firstOrCreate(
        ['email' => 'admin-pengurus-test@test.com'],
        ['name' => 'Admin Test', 'role' => User::ROLE_ADMIN, 'password' => bcrypt('password')]
    );
    $this->admin->update(['role' => User::ROLE_ADMIN]);

    Pengurus::truncate();
});

afterEach(function () {
    (new PengurusSeeder)->run();
});

test('bisa membuat pengurus dengan jabatan unik jika belum ada pengurus aktif di jabatan tersebut', function () {
    $this->actingAs($this->admin);

    Livewire::test(CreatePengurus::class)
        ->fillForm([
            'nama' => 'Test Pengurus Kepala',
            'jabatan' => Pengurus::JABATAN_KEPALA_PANTI,
            'status_aktif' => true,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    expect(Pengurus::where('nama', 'Test Pengurus Kepala')->exists())->toBeTrue();
});

test('tidak bisa membuat pengurus baru dengan jabatan Kepala Panti jika sudah ada Kepala Panti yang aktif', function () {
    $this->actingAs($this->admin);

    // Kepala panti aktif pertama
    Pengurus::create([
        'nama' => 'Test Pengurus Kepala 1',
        'jabatan' => Pengurus::JABATAN_KEPALA_PANTI,
        'status_aktif' => true,
    ]);

    // Percobaan membuat Kepala panti kedua yang aktif
    Livewire::test(CreatePengurus::class)
        ->fillForm([
            'nama' => 'Test Pengurus Kepala 2',
            'jabatan' => Pengurus::JABATAN_KEPALA_PANTI,
            'status_aktif' => true,
        ])
        ->call('create')
        ->assertHasFormErrors(['jabatan']);
});

test('tidak bisa membuat pengurus baru dengan jabatan Sekretaris jika sudah ada Sekretaris yang aktif', function () {
    $this->actingAs($this->admin);

    Pengurus::create([
        'nama' => 'Test Pengurus Sekretaris 1',
        'jabatan' => Pengurus::JABATAN_SEKRETARIS,
        'status_aktif' => true,
    ]);

    Livewire::test(CreatePengurus::class)
        ->fillForm([
            'nama' => 'Test Pengurus Sekretaris 2',
            'jabatan' => Pengurus::JABATAN_SEKRETARIS,
            'status_aktif' => true,
        ])
        ->call('create')
        ->assertHasFormErrors(['jabatan']);
});

test('tidak bisa membuat pengurus baru dengan jabatan Bendahara jika sudah ada Bendahara yang aktif', function () {
    $this->actingAs($this->admin);

    Pengurus::create([
        'nama' => 'Test Pengurus Bendahara 1',
        'jabatan' => Pengurus::JABATAN_BENDAHARA,
        'status_aktif' => true,
    ]);

    Livewire::test(CreatePengurus::class)
        ->fillForm([
            'nama' => 'Test Pengurus Bendahara 2',
            'jabatan' => Pengurus::JABATAN_BENDAHARA,
            'status_aktif' => true,
        ])
        ->call('create')
        ->assertHasFormErrors(['jabatan']);
});

test('bisa membuat lebih dari 1 pengurus dengan jabatan Pengasuh', function () {
    $this->actingAs($this->admin);

    Pengurus::create([
        'nama' => 'Test Pengurus Pengasuh 1',
        'jabatan' => Pengurus::JABATAN_PENGASUH,
        'status_aktif' => true,
    ]);

    Livewire::test(CreatePengurus::class)
        ->fillForm([
            'nama' => 'Test Pengurus Pengasuh 2',
            'jabatan' => Pengurus::JABATAN_PENGASUH,
            'status_aktif' => true,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    expect(Pengurus::where('jabatan', Pengurus::JABATAN_PENGASUH)->where('status_aktif', true)->count())->toBeGreaterThanOrEqual(2);
});

test('bisa membuat Kepala Panti baru jika Kepala Panti sebelumnya sudah tidak aktif', function () {
    $this->actingAs($this->admin);

    Pengurus::create([
        'nama' => 'Test Pengurus Kepala Lama',
        'jabatan' => Pengurus::JABATAN_KEPALA_PANTI,
        'status_aktif' => false,
    ]);

    Livewire::test(CreatePengurus::class)
        ->fillForm([
            'nama' => 'Test Pengurus Kepala Baru',
            'jabatan' => Pengurus::JABATAN_KEPALA_PANTI,
            'status_aktif' => true,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    expect(Pengurus::where('nama', 'Test Pengurus Kepala Baru')->exists())->toBeTrue();
});

test('edit pengurus Kepala Panti yang sama tidak memicu error validasi unik', function () {
    $this->actingAs($this->admin);

    $kepala = Pengurus::create([
        'nama' => 'Test Pengurus Kepala Tetap',
        'jabatan' => Pengurus::JABATAN_KEPALA_PANTI,
        'status_aktif' => true,
        'alamat' => 'Alamat Awal',
    ]);

    Livewire::test(EditPengurus::class, ['record' => $kepala->id])
        ->fillForm([
            'alamat' => 'Alamat Diperbarui',
        ])
        ->call('save')
        ->assertHasNoFormErrors();

    $kepala->refresh();
    expect($kepala->alamat)->toBe('Alamat Diperbarui');
});
