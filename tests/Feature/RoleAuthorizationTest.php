<?php

use App\Models\User;

beforeEach(function () {
    $this->admin = User::firstOrCreate(
        ['email' => 'admin@test.com'],
        ['name' => 'Administrator', 'role' => User::ROLE_ADMIN, 'password' => bcrypt('password')]
    );
    $this->admin->update(['role' => User::ROLE_ADMIN]);

    $this->kepala = User::firstOrCreate(
        ['email' => 'kepala@test.com'],
        ['name' => 'Kepala Panti', 'role' => User::ROLE_KEPALA_PANTI, 'password' => bcrypt('password')]
    );
    $this->kepala->update(['role' => User::ROLE_KEPALA_PANTI]);

    $this->pengurus = User::firstOrCreate(
        ['email' => 'pengurus@test.com'],
        ['name' => 'Pengurus Panti', 'role' => User::ROLE_PENGURUS, 'password' => bcrypt('password')]
    );
    $this->pengurus->update(['role' => User::ROLE_PENGURUS]);

    $this->pengasuh = User::firstOrCreate(
        ['email' => 'pengasuh@test.com'],
        ['name' => 'Pengasuh Panti', 'role' => User::ROLE_PENGASUH, 'password' => bcrypt('password')]
    );
    $this->pengasuh->update(['role' => User::ROLE_PENGASUH]);
});

test('admin has full access to all features and settings', function () {
    $this->actingAs($this->admin);

    $this->get('/dashboard')->assertOk();
    $this->get('/dashboard/users')->assertOk();
    $this->get('/dashboard/manage-panti-settings')->assertOk();
    $this->get('/dashboard/anak-asuh')->assertOk()->assertSeeText('Tambah Anak Asuh');
    $this->get('/dashboard/anak-asuh/create')->assertOk();
    $this->get('/dashboard/monitoring-pendidikan')->assertOk();
    $this->get('/dashboard/monitoring-pendidikan/create')->assertOk();
    $this->get('/dashboard/monitoring-kesehatan')->assertOk();
    $this->get('/dashboard/monitoring-kesehatan/create')->assertOk();
    $this->get('/dashboard/donasi')->assertOk();
    $this->get('/dashboard/donatur')->assertOk();
    $this->get('/dashboard/inventaris')->assertOk();
    $this->get('/dashboard/kegiatan')->assertOk();
    $this->get('/dashboard/pengurus')->assertOk();
    $this->get('/dashboard/laporan-page')->assertOk()->assertSeeText('Riwayat & Audit Log Pencetakan Laporan');
    $this->get(route('laporan.anak-asuh'))->assertOk();
});

test('kepala panti has read-only access and cannot edit or manage settings', function () {
    $this->actingAs($this->kepala);

    $this->get('/dashboard')->assertOk();
    $this->get('/dashboard/users')->assertForbidden()->assertSeeText('Akses Dibatasi');
    $this->get('/dashboard/manage-panti-settings')->assertForbidden()->assertSeeText('Akses Dibatasi');

    // Read access (Create button is hidden)
    $this->get('/dashboard/anak-asuh')->assertOk()->assertSeeText('Read-Only')->assertDontSeeText('Tambah Anak Asuh');
    $this->get('/dashboard/monitoring-pendidikan')->assertOk()->assertSeeText('Read-Only')->assertDontSeeText('Tambah Data');
    $this->get('/dashboard/monitoring-kesehatan')->assertOk()->assertSeeText('Read-Only')->assertDontSeeText('Tambah Data');
    $this->get('/dashboard/donasi')->assertOk()->assertSeeText('Read-Only')->assertDontSeeText('Tambah Donasi');
    $this->get('/dashboard/donatur')->assertOk()->assertSeeText('Read-Only')->assertDontSeeText('Tambah Donatur');
    $this->get('/dashboard/inventaris')->assertOk()->assertSeeText('Read-Only')->assertDontSeeText('Tambah Barang');
    $this->get('/dashboard/kegiatan')->assertOk()->assertSeeText('Read-Only')->assertDontSeeText('Tambah Kegiatan');
    $this->get('/dashboard/pengurus')->assertOk()->assertSeeText('Read-Only')->assertDontSeeText('Tambah Pengurus');
    $this->get('/dashboard/laporan-page')->assertOk()->assertSeeText('Riwayat & Audit Log Pencetakan Laporan');
    $this->get(route('laporan.anak-asuh'))->assertOk();

    // Blocked creation renders custom alert view with informative explanation
    $this->get('/dashboard/anak-asuh/create')->assertForbidden()->assertSeeText('Akses Dibatasi');
    $this->get('/dashboard/monitoring-pendidikan/create')->assertForbidden()->assertSeeText('Akses Dibatasi');
    $this->get('/dashboard/monitoring-kesehatan/create')->assertForbidden()->assertSeeText('Akses Dibatasi');
    $this->get('/dashboard/donasi/create')->assertForbidden()->assertSeeText('Akses Dibatasi');
    $this->get('/dashboard/donatur/create')->assertForbidden()->assertSeeText('Akses Dibatasi');
    $this->get('/dashboard/inventaris/create')->assertForbidden()->assertSeeText('Akses Dibatasi');
    $this->get('/dashboard/kegiatan/create')->assertForbidden()->assertSeeText('Akses Dibatasi');
    $this->get('/dashboard/pengurus/create')->assertForbidden()->assertSeeText('Akses Dibatasi');
});

test('pengurus has operational CRUD access but cannot access settings, user management, or audit log', function () {
    $this->actingAs($this->pengurus);

    $this->get('/dashboard')->assertOk();
    $this->get('/dashboard/users')->assertForbidden()->assertSeeText('Akses Dibatasi');
    $this->get('/dashboard/manage-panti-settings')->assertForbidden()->assertSeeText('Akses Dibatasi');

    // Operational CRUD allowed (Create button is visible)
    $this->get('/dashboard/anak-asuh')->assertOk()->assertDontSeeText('Read-Only')->assertSeeText('Tambah Anak Asuh');
    $this->get('/dashboard/anak-asuh/create')->assertOk();
    $this->get('/dashboard/monitoring-pendidikan')->assertOk()->assertSeeText('Tambah Data');
    $this->get('/dashboard/monitoring-pendidikan/create')->assertOk();
    $this->get('/dashboard/monitoring-kesehatan')->assertOk()->assertSeeText('Tambah Data');
    $this->get('/dashboard/monitoring-kesehatan/create')->assertOk();
    $this->get('/dashboard/donasi')->assertOk()->assertSeeText('Tambah Donasi');
    $this->get('/dashboard/donasi/create')->assertOk();
    $this->get('/dashboard/donatur')->assertOk()->assertSeeText('Tambah Donatur');
    $this->get('/dashboard/donatur/create')->assertOk();
    $this->get('/dashboard/inventaris')->assertOk()->assertSeeText('Tambah Barang');
    $this->get('/dashboard/inventaris/create')->assertOk();
    $this->get('/dashboard/kegiatan')->assertOk()->assertSeeText('Tambah Kegiatan');
    $this->get('/dashboard/kegiatan/create')->assertOk();
    $this->get('/dashboard/pengurus')->assertOk()->assertSeeText('Tambah Pengurus');
    $this->get('/dashboard/pengurus/create')->assertOk();

    // Laporan allowed but audit log hidden
    $this->get('/dashboard/laporan-page')->assertOk()->assertDontSeeText('Riwayat & Audit Log Pencetakan Laporan');
    $this->get(route('laporan.anak-asuh'))->assertOk();
});

test('pengasuh can view dashboard, has read access to anak asuh and CRUD to monitoring, blocked from everything else', function () {
    $this->actingAs($this->pengasuh);

    $this->get('/dashboard')->assertOk();
    $this->get('/dashboard/users')->assertForbidden()->assertSeeText('Akses Dibatasi');
    $this->get('/dashboard/manage-panti-settings')->assertForbidden()->assertSeeText('Akses Dibatasi');

    // Anak asuh: Read only (Create button hidden)
    $this->get('/dashboard/anak-asuh')->assertOk()->assertSeeText('Read-Only')->assertDontSeeText('Tambah Anak Asuh');
    $this->get('/dashboard/anak-asuh/create')->assertForbidden()->assertSeeText('Akses Dibatasi');

    // Monitoring: CRUD (Create button visible)
    $this->get('/dashboard/monitoring-pendidikan')->assertOk()->assertDontSeeText('Read-Only')->assertSeeText('Tambah Data');
    $this->get('/dashboard/monitoring-pendidikan/create')->assertOk();
    $this->get('/dashboard/monitoring-kesehatan')->assertOk()->assertDontSeeText('Read-Only')->assertSeeText('Tambah Data');
    $this->get('/dashboard/monitoring-kesehatan/create')->assertOk();

    // Blocked operational resources show alert view
    $this->get('/dashboard/donasi')->assertForbidden()->assertSeeText('Akses Dibatasi');
    $this->get('/dashboard/donatur')->assertForbidden()->assertSeeText('Akses Dibatasi');
    $this->get('/dashboard/inventaris')->assertForbidden()->assertSeeText('Akses Dibatasi');
    $this->get('/dashboard/kegiatan')->assertForbidden()->assertSeeText('Akses Dibatasi');
    $this->get('/dashboard/pengurus')->assertForbidden()->assertSeeText('Akses Dibatasi');

    // Blocked reports show alert view
    $this->get('/dashboard/laporan-page')->assertForbidden()->assertSeeText('Akses Dibatasi');
    $this->get(route('laporan.anak-asuh'))->assertForbidden()->assertSeeText('Akses Dibatasi');
    $this->get(route('laporan.donasi'))->assertForbidden()->assertSeeText('Akses Dibatasi');
    $this->get(route('laporan.perkembangan'))->assertForbidden()->assertSeeText('Akses Dibatasi');
});
