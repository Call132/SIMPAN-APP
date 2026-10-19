<?php

namespace Database\Seeders;

use App\Models\Pengurus;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PengurusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Reset data pengurus agar sesuai batasan jabatan unik
        Pengurus::truncate();

        // 1. Kepala Panti (Maksimal 1 orang aktif)
        Pengurus::create([
            'nama' => 'Drs. H. Ahmad Dahlan, M.Pd.',
            'jabatan' => Pengurus::JABATAN_KEPALA_PANTI,
            'alamat' => $faker->address,
            'telepon' => '081234567890',
            'tanggal_mulai_tugas' => '2022-01-15',
            'status_aktif' => true,
        ]);

        // 2. Sekretaris (Maksimal 1 orang aktif)
        Pengurus::create([
            'nama' => 'Siti Nurhaliza, S.Sos.',
            'jabatan' => Pengurus::JABATAN_SEKRETARIS,
            'alamat' => $faker->address,
            'telepon' => '081234567891',
            'tanggal_mulai_tugas' => '2022-03-01',
            'status_aktif' => true,
        ]);

        // 3. Bendahara (Maksimal 1 orang aktif)
        Pengurus::create([
            'nama' => 'H. Muhammad Ridwan, S.E.',
            'jabatan' => Pengurus::JABATAN_BENDAHARA,
            'alamat' => $faker->address,
            'telepon' => '081234567892',
            'tanggal_mulai_tugas' => '2022-03-01',
            'status_aktif' => true,
        ]);

        // 4. Pengasuh Panti (Boleh lebih dari 1 orang)
        $daftarPengasuh = [
            'Ustadzah Maryam, S.Pd.I.',
            'Ustadz Farhan Al-Ghifari',
            'Nurul Hidayati, S.Pd.',
            'Rahmat Hidayatullah',
            'Dewi Anggraini, S.Kep.',
        ];

        foreach ($daftarPengasuh as $index => $namaPengasuh) {
            Pengurus::create([
                'nama' => $namaPengasuh,
                'jabatan' => Pengurus::JABATAN_PENGASUH,
                'alamat' => $faker->address,
                'telepon' => '0812345678' . (93 + $index),
                'tanggal_mulai_tugas' => $faker->dateTimeBetween('-2 years', '-6 months')->format('Y-m-d'),
                'status_aktif' => true,
            ]);
        }
    }
}
