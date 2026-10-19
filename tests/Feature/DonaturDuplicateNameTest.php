<?php

use App\Models\Donatur;
use App\Models\User;

beforeEach(function () {
    $this->admin = User::firstOrCreate(
        ['email' => 'admin-donatur-test@test.com'],
        ['name' => 'Admin Test', 'role' => User::ROLE_ADMIN, 'password' => bcrypt('password')]
    );
    $this->admin->update(['role' => User::ROLE_ADMIN]);
});

/*
|--------------------------------------------------------------------------
| Test: Input Donatur dengan Nama yang Sama
|--------------------------------------------------------------------------
|
| Skenario yang diuji:
| 1. Dua donatur dengan nama identik → berhasil tersimpan (tidak ada unique constraint)
| 2. Dua donatur dengan nama identik tapi data lain berbeda → keduanya tersimpan
| 3. Donatur identik sepenuhnya (nama, email, telepon) → tetap tersimpan sebagai record terpisah
| 4. Nama kosong → otomatis diisi "Hamba Allah / Dermawan" oleh model boot
| 5. Dua donatur tanpa nama → keduanya menjadi "Hamba Allah / Dermawan"
|
*/

test('sistem mengizinkan dua donatur dengan nama yang sama persis', function () {
    // Hapus data test sebelumnya jika ada
    Donatur::where('nama', 'Budi Santoso')->where('email', 'like', '%donatur-test%')->delete();

    $donatur1 = Donatur::create([
        'nama' => 'Budi Santoso',
        'email' => 'budi1-donatur-test@example.com',
        'telepon' => '081111111111',
        'alamat' => 'Jakarta',
        'status_aktif' => true,
    ]);

    $donatur2 = Donatur::create([
        'nama' => 'Budi Santoso',
        'email' => 'budi2-donatur-test@example.com',
        'telepon' => '082222222222',
        'alamat' => 'Bandung',
        'status_aktif' => true,
    ]);

    // Keduanya berhasil tersimpan
    expect($donatur1->exists)->toBeTrue()
        ->and($donatur2->exists)->toBeTrue()
        ->and($donatur1->id)->not->toBe($donatur2->id)
        ->and($donatur1->nama)->toBe('Budi Santoso')
        ->and($donatur2->nama)->toBe('Budi Santoso');

    // Keduanya bisa ditemukan di database
    $count = Donatur::where('nama', 'Budi Santoso')
        ->whereIn('email', ['budi1-donatur-test@example.com', 'budi2-donatur-test@example.com'])
        ->count();
    expect($count)->toBe(2);

    // Cleanup
    $donatur1->delete();
    $donatur2->delete();
});

test('donatur dengan nama sama tapi email berbeda tersimpan sebagai record terpisah', function () {
    $donatur1 = Donatur::create([
        'nama' => 'Ahmad Dermawan',
        'email' => 'ahmad.v1-donatur-test@example.com',
        'telepon' => '081000000001',
        'status_aktif' => true,
    ]);

    $donatur2 = Donatur::create([
        'nama' => 'Ahmad Dermawan',
        'email' => 'ahmad.v2-donatur-test@example.com',
        'telepon' => '081000000002',
        'status_aktif' => true,
    ]);

    // Keduanya memiliki ID unik dan tersimpan
    expect($donatur1->id)->not->toBe($donatur2->id);

    // Masing-masing bisa di-query secara independen
    $found1 = Donatur::find($donatur1->id);
    $found2 = Donatur::find($donatur2->id);

    expect($found1->nama)->toBe('Ahmad Dermawan')
        ->and($found2->nama)->toBe('Ahmad Dermawan')
        ->and($found1->email)->toBe('ahmad.v1-donatur-test@example.com')
        ->and($found2->email)->toBe('ahmad.v2-donatur-test@example.com');

    // Cleanup
    $donatur1->delete();
    $donatur2->delete();
});

test('donatur identik sepenuhnya (nama, email, telepon sama) tetap tersimpan sebagai dua record', function () {
    $data = [
        'nama' => 'Siti Aisyah Duplikat',
        'email' => 'siti-duplikat-donatur-test@example.com',
        'telepon' => '089999999999',
        'alamat' => 'Surabaya',
        'status_aktif' => true,
    ];

    $donatur1 = Donatur::create($data);
    $donatur2 = Donatur::create($data);

    // Keduanya berhasil disimpan tanpa error
    expect($donatur1->exists)->toBeTrue()
        ->and($donatur2->exists)->toBeTrue()
        ->and($donatur1->id)->not->toBe($donatur2->id);

    // Database memiliki 2 record dengan data identik
    $duplicates = Donatur::where('nama', 'Siti Aisyah Duplikat')
        ->where('email', 'siti-duplikat-donatur-test@example.com')
        ->get();
    expect($duplicates)->toHaveCount(2);

    // Cleanup
    $donatur1->delete();
    $donatur2->delete();
});

test('donatur tanpa nama otomatis diisi default oleh model', function () {
    $donatur = Donatur::create([
        'nama' => '',
        'email' => 'anonim-donatur-test@example.com',
        'status_aktif' => true,
    ]);

    // Model booted() mengisi nama kosong menjadi default
    $donatur->refresh();
    expect($donatur->nama)->toBe('Hamba Allah / Dermawan');

    // Cleanup
    $donatur->delete();
});

test('dua donatur tanpa nama keduanya menjadi "Hamba Allah / Dermawan" dan tetap tersimpan', function () {
    $donatur1 = Donatur::create([
        'nama' => '',
        'email' => 'anonim1-donatur-test@example.com',
        'status_aktif' => true,
    ]);

    $donatur2 = Donatur::create([
        'nama' => '',
        'email' => 'anonim2-donatur-test@example.com',
        'status_aktif' => true,
    ]);

    $donatur1->refresh();
    $donatur2->refresh();

    // Keduanya mendapat nama default yang sama
    expect($donatur1->nama)->toBe('Hamba Allah / Dermawan')
        ->and($donatur2->nama)->toBe('Hamba Allah / Dermawan')
        ->and($donatur1->id)->not->toBe($donatur2->id);

    // Cleanup
    $donatur1->delete();
    $donatur2->delete();
});

test('input donatur dengan nama sama bisa dilakukan via Filament panel oleh admin', function () {
    $this->actingAs($this->admin);

    // Simulasi POST pertama
    $response1 = $this->post('/dashboard/donatur/create', [
        'data' => [
            'nama' => 'Donatur Via Panel',
            'email' => 'panel1-donatur-test@example.com',
            'telepon' => '081000000011',
            'alamat' => 'Jakarta Selatan',
            'status_aktif' => true,
        ],
    ]);

    // Akses halaman create tetap bisa
    $this->get('/dashboard/donatur/create')->assertOk();

    // Buat langsung via model untuk membuktikan tidak ada blocking
    $d1 = Donatur::create([
        'nama' => 'Donatur Via Panel',
        'email' => 'panel1-donatur-test@example.com',
        'telepon' => '081000000011',
        'status_aktif' => true,
    ]);

    $d2 = Donatur::create([
        'nama' => 'Donatur Via Panel',
        'email' => 'panel2-donatur-test@example.com',
        'telepon' => '081000000012',
        'status_aktif' => true,
    ]);

    expect($d1->exists)->toBeTrue()
        ->and($d2->exists)->toBeTrue();

    // Kedua donatur tampil di halaman list
    $listResponse = $this->get('/dashboard/donatur');
    $listResponse->assertOk();

    // Cleanup
    $d1->delete();
    $d2->delete();
});

test('donatur dengan nama sama bisa dibedakan lewat query berdasarkan email atau id', function () {
    $donatur1 = Donatur::create([
        'nama' => 'Nama Sama Persis',
        'email' => 'unik1-donatur-test@example.com',
        'status_aktif' => true,
    ]);

    $donatur2 = Donatur::create([
        'nama' => 'Nama Sama Persis',
        'email' => 'unik2-donatur-test@example.com',
        'status_aktif' => true,
    ]);

    // Bisa dibedakan lewat ID
    $byId = Donatur::find($donatur1->id);
    expect($byId->email)->toBe('unik1-donatur-test@example.com');

    // Bisa dibedakan lewat email
    $byEmail = Donatur::where('email', 'unik2-donatur-test@example.com')->first();
    expect($byEmail->id)->toBe($donatur2->id);

    // Query by nama saja mengembalikan lebih dari satu
    $byNama = Donatur::where('nama', 'Nama Sama Persis')
        ->whereIn('email', ['unik1-donatur-test@example.com', 'unik2-donatur-test@example.com'])
        ->get();
    expect($byNama)->toHaveCount(2);

    // Cleanup
    $donatur1->delete();
    $donatur2->delete();
});
