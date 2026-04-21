<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kegiatans = [
            [
                'nama_kegiatan' => 'Buka Puasa Bersama Anak Yatim',
                'deskripsi' => '<p>Acara tahunan buka puasa bersama para donatur dan masyarakat sekitar. Dilanjutkan dengan sholat maghrib berjamaah dan tausiyah singkat.</p>',
                'tanggal_mulai' => now()->subDays(5)->setTime(16, 30),
                'tanggal_selesai' => now()->subDays(5)->setTime(19, 0),
                'tempat' => 'Aula Utama Panti Asuhan',
                'kategori' => 'keagamaan',
                'penanggung_jawab' => 'Ustaz Ahmad',
                'dokumentasi' => [],
                'is_published' => true,
                'is_public_photo' => true,
            ],
            [
                'nama_kegiatan' => 'Kelas Keterampilan Komputer & Coding',
                'deskripsi' => '<p>Pelatihan dasar penggunaan komputer dan pengenalan dunia pemrograman dasar bagi anak asuh tingkat SMP dan SMA untuk persiapan masa depan.</p>',
                'tanggal_mulai' => now()->subDays(10)->setTime(9, 0),
                'tanggal_selesai' => now()->subDays(10)->setTime(12, 0),
                'tempat' => 'Ruang Laboratorium Komputer',
                'kategori' => 'pendidikan',
                'penanggung_jawab' => 'Kak Budi S.',
                'dokumentasi' => [],
                'is_published' => true,
                'is_public_photo' => true,
            ],
            [
                'nama_kegiatan' => 'Kerja Bakti Membersihkan Lingkungan',
                'deskripsi' => '<p>Gotong royong membersihkan asrama, pengecatan ulang tembok, dan berkebun. Menanamkan nilai kebersihan dan kerjasama antar penghuni panti.</p>',
                'tanggal_mulai' => now()->subDays(15)->setTime(7, 0),
                'tanggal_selesai' => now()->subDays(15)->setTime(11, 0),
                'tempat' => 'Seluruh Area Panti Asuhan',
                'kategori' => 'sosial',
                'penanggung_jawab' => 'Ibu Panti',
                'dokumentasi' => [],
                'is_published' => true,
                'is_public_photo' => true,
            ],
            [
                'nama_kegiatan' => 'Pelatihan Membatik dan Kerajinan Tangan',
                'deskripsi' => '<p>Pengembangan kreativitas anak-anak panti melalui kerajinan tangan dari barang bekas dan latihan dasar membatik motif sederhana.</p>',
                'tanggal_mulai' => now()->subDays(20)->setTime(14, 0),
                'tanggal_selesai' => now()->subDays(20)->setTime(16, 0),
                'tempat' => 'Ruang Keterampilan',
                'kategori' => 'keterampilan',
                'penanggung_jawab' => 'Kak Ratna',
                'dokumentasi' => [],
                'is_published' => true,
                'is_public_photo' => true,
            ],
            [
                'nama_kegiatan' => 'Rekreasi Akhir Tahun Ajaran',
                'deskripsi' => '<p>Perjalanan wisata ke taman edukasi untuk melepas penat setelah selesai ujian sekolah. Acara penuh game seru dan pembagian dorprise.</p>',
                'tanggal_mulai' => now()->subDays(30)->setTime(7, 0),
                'tanggal_selesai' => now()->subDays(30)->setTime(17, 30),
                'tempat' => 'Taman Impian Jaya Ancol',
                'kategori' => 'lainnya',
                'penanggung_jawab' => 'Kepanitiaan Bersama',
                'dokumentasi' => [],
                'is_published' => true,
                'is_public_photo' => true,
            ]
        ];

        foreach ($kegiatans as $kegiatan) {
            \App\Models\Kegiatan::create($kegiatan);
        }
    }
}
