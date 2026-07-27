<?php

namespace Database\Seeders;

use App\Models\AnakAsuh;
use App\Models\Donasi;
use App\Models\Donatur;
use App\Models\Inventaris;
use App\Models\Pengurus;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User Admin (opsional jika belum ada)
        User::firstOrCreate(
            ['email' => 'admin@test.com'],
            ['name' => 'Admin Panel', 'password' => bcrypt('password')]
        );

        $faker = Faker::create('id_ID');

        // 1. Anak Asuh (10)
        for ($i = 0; $i < 10; $i++) {
            AnakAsuh::create([
                'nama_lengkap' => $faker->name,
                'nama_panggilan' => $faker->firstName,
                'jenis_kelamin' => $faker->randomElement(['L', 'P']),
                'tempat_lahir' => $faker->city,
                'tanggal_lahir' => $faker->dateTimeBetween('-15 years', '-5 years')->format('Y-m-d'),
                'agama' => 'Islam',
                'alamat_asal' => $faker->address,
                'keterangan_masuk' => $faker->sentence,
                'golongan_darah' => $faker->randomElement(['A', 'B', 'AB', 'O']),
                'tinggi_badan' => $faker->randomFloat(1, 100, 160),
                'berat_badan' => $faker->randomFloat(1, 20, 60),
                'riwayat_penyakit' => '-',
                'alergi' => '-',
                'catatan_kesehatan_lain' => 'Sehat',
                'tingkat_pendidikan' => $faker->randomElement(['SD', 'SMP']),
                'nama_sekolah' => 'Sekolah ' . $faker->city,
                'kelas' => (string)$faker->numberBetween(1, 6),
                'status_aktif' => true,
            ]);
        }

        // 2. Pengurus (5)
        for ($i = 0; $i < 5; $i++) {
            Pengurus::create([
                'nama' => $faker->name,
                'jabatan' => $faker->randomElement(['Ketua', 'Sekretaris', 'Bendahara', 'Pengasuh']),
                'alamat' => $faker->address,
                'telepon' => $faker->phoneNumber,
                'tanggal_mulai_tugas' => $faker->dateTimeBetween('-3 years', 'now')->format('Y-m-d'),
                'status_aktif' => true,
            ]);
        }

        // 3. Donatur (5)
        $donaturs = [];
        for ($i = 0; $i < 5; $i++) {
            $donaturs[] = Donatur::create([
                'nama' => $i === 0 ? null : $faker->name,
                'email' => $faker->safeEmail,
                'telepon' => $faker->phoneNumber,
                'alamat' => $faker->address,
                'status_aktif' => true,
            ]);
        }

        // 4. Donasi (15)
        for ($i = 0; $i < 15; $i++) {
            $jenis = $faker->randomElement(['uang', 'barang', 'makanan', 'pakaian']);
            Donasi::create([
                'donatur_id' => $faker->randomElement($donaturs)->id,
                'tanggal_donasi' => $faker->dateTimeBetween('-6 months', 'now')->format('Y-m-d'),
                'jenis_donasi' => $jenis,
                'jumlah_uang' => $jenis === 'uang' ? $faker->randomElement([50000, 100000, 250000, 500000, 1000000, 1500000]) : null,
                'satuan_barang' => $jenis !== 'uang' ? 'Paket' : null,
                'jumlah_barang' => $jenis !== 'uang' ? $faker->numberBetween(1, 50) : null,
                'keterangan' => 'Sumbangan operasional',
                'bukti_transfer' => null,
            ]);
        }

        // 5. Inventaris (5)
        for ($i = 0; $i < 5; $i++) {
            Inventaris::create([
                'nama_barang' => $faker->randomElement(['Lemari Es', 'Kipas Angin', 'Meja Belajar', 'Kursi', 'Laptop']),
                'kategori' => $faker->randomElement(['elektronik', 'mebel', 'perlengkapan']),
                'jumlah' => $faker->numberBetween(1, 10),
                'kondisi' => 'baik',
                'lokasi_penyimpanan' => $faker->randomElement(['Gudang', 'Ruang Tamu', 'Kamar', 'Dapur']),
                'tanggal_pembelian' => $faker->dateTimeBetween('-4 years', 'now')->format('Y-m-d'),
                'keterangan' => $faker->sentence,
            ]);
        }

        // 6. Monitoring (Observasi Harian, Pendidikan, Kesehatan)
        $this->call(MonitoringSeeder::class);
    }
}
