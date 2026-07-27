<?php

namespace Database\Seeders;

use App\Models\AnakAsuh;
use App\Models\Monitoring;
use App\Models\MonitoringKesehatan;
use App\Models\MonitoringPendidikan;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MonitoringSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Pastikan ada AnakAsuh di database
        $anakList = AnakAsuh::all();

        if ($anakList->isEmpty()) {
            $this->call(DatabaseSeeder::class);
            $anakList = AnakAsuh::all();
        }

        $catatanObservasi = [
            "Aktif mengikuti shalat berjamaah dan tadarus Al-Qur'an bersama teman-teman.",
            "Menunjukkan kepemimpinan yang baik saat mendampingi adik-adiknya belajar malam.",
            "Semangat dalam mengikuti latihan futsal mingguan panti.",
            "Tampak agak lesu, sudah diajak berdiskusi dan motivasi oleh pengurus.",
            "Sangat mandiri dalam menjaga kebersihan kamar dan barang pribadi.",
            "Mengikuti program bimbingan belajar bahasa Inggris dengan antusias.",
            "Membantu dapur panti dengan sigap pada kegiatan akhir pekan.",
        ];

        $prestasiList = [
            "Juara 1 Lomba Azan Tingkat Kecamatan",
            "Juara 3 Cerdas Cermat Sains",
            "Perwakilan Tim Futsal Sekolah",
            "Juara Harapan 1 Lomba Mewarnai",
            "Penerima Beasiswa Prestasi Sekolah",
            "Anggota Pramuka Teladan",
        ];

        $catatanGuruList = [
            "Siswa yang sangat rajin, memiliki rasa ingin tahu yang tinggi di kelas.",
            "Sangat sopan dan menghormati guru serta siap membantu teman-temannya.",
            "Prestasi akademik sangat memuaskan, pertahankan semangat belajarnya.",
            "Perlu sedikit ditingkatkan konsentrasi pada mata pelajaran Matematika.",
        ];

        $pemeriksaList = [
            "Dr. Bambang Purnomo, Sp.A",
            "Dr. Siti Aminah",
            "Bidan Ratna, S.ST",
            "Tim Medis Puskesmas",
        ];

        foreach ($anakList as $anak) {
            // 1. Seed Log Observasi Harian (3-5 record per anak)
            for ($i = 0; $i < rand(3, 5); $i++) {
                Monitoring::create([
                    'anak_asuh_id' => $anak->id,
                    'tanggal' => $faker->dateTimeBetween('-4 months', 'now')->format('Y-m-d'),
                    'catatan' => $faker->randomElement($catatanObservasi),
                ]);
            }

            // 2. Seed Monitoring Pendidikan (2 semester per anak)
            $semesters = [
                ['tahun' => '2024/2025', 'sem' => 'Genap', 'tgl' => '2025-01-10'],
                ['tahun' => '2025/2026', 'sem' => 'Ganjil', 'tgl' => '2025-07-15'],
            ];

            foreach ($semesters as $s) {
                MonitoringPendidikan::create([
                    'anak_asuh_id' => $anak->id,
                    'tahun_ajaran' => $s['tahun'],
                    'semester' => $s['sem'],
                    'nama_sekolah' => $anak->nama_sekolah ?? ('SD Negeri ' . $faker->numberBetween(1, 10)),
                    'kelas' => $anak->kelas ?? (string)$faker->numberBetween(1, 6),
                    'nilai_rata_rata' => $faker->randomFloat(1, 75, 95),
                    'persentase_kehadiran' => $faker->numberBetween(90, 100),
                    'prestasi' => $faker->optional(0.6)->randomElement($prestasiList),
                    'catatan_guru' => $faker->randomElement($catatanGuruList),
                    'tanggal_input' => $s['tgl'],
                ]);
            }

            // 3. Seed Monitoring Kesehatan (2-3 kali pemeriksaan per anak)
            for ($k = 0; $k < rand(2, 3); $k++) {
                $tb = $faker->numberBetween(120, 155);
                $bb = $faker->numberBetween(25, 48);

                MonitoringKesehatan::create([
                    'anak_asuh_id' => $anak->id,
                    'tanggal_pemeriksaan' => $faker->dateTimeBetween('-6 months', 'now')->format('Y-m-d'),
                    'tinggi_badan' => $tb,
                    'berat_badan' => $bb,
                    'lingkar_kepala' => $faker->numberBetween(50, 55),
                    'status_gizi' => $faker->randomElement(['Baik', 'Baik', 'Baik', 'Kurang', 'Lebih']),
                    'keluhan' => $faker->optional(0.4)->randomElement(['Batuk dan pilek ringan', 'Pusing sedikit', 'Nafsu makan berkurang']),
                    'diagnosis' => $faker->randomElement(['Kondisi Fisik Sehat & Fit', 'ISPA Ringan', 'Status Gizi Baik']),
                    'tindakan' => $faker->randomElement(['Pemberian multivitamin & istirahat', 'Pemberian obat batuk herbal & air hangat', 'Edukasi gizi seimbang']),
                    'nama_pemeriksa' => $faker->randomElement($pemeriksaList),
                    'catatan_tambahan' => 'Pertahankan pola hidup bersih dan sehat di lingkungan panti.',
                ]);
            }
        }
    }
}
