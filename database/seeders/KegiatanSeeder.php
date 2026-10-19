<?php

namespace Database\Seeders;

use App\Models\Kegiatan;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class KegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Bersihkan data kegiatan sebelumnya
        Kegiatan::truncate();

        $kegiatans = [
            [
                'nama_kegiatan' => 'Kajian Rutin & Tahfidz Al-Qur\'an Ba\'da Maghrib',
                'deskripsi' => '<p>Kegiatan harian bimbingan membaca Al-Qur\'an, perbaikan makharijul huruf, tajwid, serta setoran hafalan surat pendek juz 30 oleh seluruh anak asuh panti.</p>',
                'tanggal_mulai' => Carbon::now()->subDays(2)->setTime(18, 15),
                'tanggal_selesai' => Carbon::now()->subDays(2)->setTime(19, 30),
                'tempat' => 'Musholla As-Salam Panti Asuhan',
                'kategori' => 'keagamaan',
                'penanggung_jawab' => 'Ustadzah Maryam, S.Pd.I.',
                'dokumentasi' => [],
                'is_published' => true,
                'is_public_photo' => true,
            ],
            [
                'nama_kegiatan' => 'Bimbingan Belajar & Pendampingan Tugas Sekolah',
                'deskripsi' => '<p>Pendampingan intensif belajar bersama relawan mahasiswa dan pengasuh untuk mata pelajaran Matematika, IPA, dan Bahasa Inggris guna persiapan ulangan harian.</p>',
                'tanggal_mulai' => Carbon::now()->subDays(4)->setTime(15, 30),
                'tanggal_selesai' => Carbon::now()->subDays(4)->setTime(17, 0),
                'tempat' => 'Ruang Belajar Bersama',
                'kategori' => 'pendidikan',
                'penanggung_jawab' => 'Nurul Hidayati, S.Pd.',
                'dokumentasi' => [],
                'is_published' => true,
                'is_public_photo' => true,
            ],
            [
                'nama_kegiatan' => 'Pelatihan Komputer Dasar & Pengenalan Internet Positif',
                'deskripsi' => '<p>Pengenalan dasar pengoperasian Microsoft Office (Word, PowerPoint) dan edukasi pemanfaatan teknologi digital secara sehat untuk anak asuh jenjang SMP dan SMA.</p>',
                'tanggal_mulai' => Carbon::now()->subDays(7)->setTime(9, 0),
                'tanggal_selesai' => Carbon::now()->subDays(7)->setTime(11, 30),
                'tempat' => 'Laboratorium Komputer Panti',
                'kategori' => 'keterampilan',
                'penanggung_jawab' => 'Ustadz Farhan Al-Ghifari',
                'dokumentasi' => [],
                'is_published' => true,
                'is_public_photo' => true,
            ],
            [
                'nama_kegiatan' => 'Pemeriksaan Kesehatan Berkala & Penyuluhan Gizi',
                'deskripsi' => '<p>Pemeriksaan kesehatan fisik rutin (tensi, berat/tinggi badan, kesehatan gigi dan kulit) bekerja sama dengan tenaga medis Puskesmas setempat.</p>',
                'tanggal_mulai' => Carbon::now()->subDays(12)->setTime(8, 30),
                'tanggal_selesai' => Carbon::now()->subDays(12)->setTime(12, 0),
                'tempat' => 'Aula Serbaguna Panti Asuhan',
                'kategori' => 'sosial',
                'penanggung_jawab' => 'Dewi Anggraini, S.Kep.',
                'dokumentasi' => [],
                'is_published' => true,
                'is_public_photo' => true,
            ],
            [
                'nama_kegiatan' => 'Kerja Bakti Kebersihan Asrama (Jumat Bersih)',
                'deskripsi' => '<p>Gotong royong seluruh anak asuh dan pengurus membersihkan kamar tidur, taman asrama, ruang makan, dan penataan lemari pakaian untuk membiasakan hidup higienis.</p>',
                'tanggal_mulai' => Carbon::now()->subDays(14)->setTime(7, 30),
                'tanggal_selesai' => Carbon::now()->subDays(14)->setTime(10, 0),
                'tempat' => 'Seluruh Lingkungan Panti Asuhan',
                'kategori' => 'sosial',
                'penanggung_jawab' => 'Rahmat Hidayatullah',
                'dokumentasi' => [],
                'is_published' => true,
                'is_public_photo' => true,
            ],
            [
                'nama_kegiatan' => 'Pelatihan Kewirausahaan & Tata Boga (Membuat Pastry)',
                'deskripsi' => '<p>Pelatihan membuat aneka kue kering dan roti manis bagi remaja panti sebagai bekal kemandirian ekonomi dan keahlian wirausaha kuliner masa depan.</p>',
                'tanggal_mulai' => Carbon::now()->subDays(18)->setTime(13, 0),
                'tanggal_selesai' => Carbon::now()->subDays(18)->setTime(16, 0),
                'tempat' => 'Dapur Keterampilan Panti',
                'kategori' => 'keterampilan',
                'penanggung_jawab' => 'Siti Nurhaliza, S.Sos.',
                'dokumentasi' => [],
                'is_published' => true,
                'is_public_photo' => true,
            ],
            [
                'nama_kegiatan' => 'Peringatan Hari Besar Islam & Santunan Anak Asuh',
                'deskripsi' => '<p>Rangkaian tausiyah agama, pembacaan shalawat nabi, serta santunan dan apresiasi prestasi bagi anak-anak berprestasi di sekolah.</p>',
                'tanggal_mulai' => Carbon::now()->subDays(25)->setTime(19, 30),
                'tanggal_selesai' => Carbon::now()->subDays(25)->setTime(22, 0),
                'tempat' => 'Aula Utama Panti Asuhan',
                'kategori' => 'keagamaan',
                'penanggung_jawab' => 'Drs. H. Ahmad Dahlan, M.Pd.',
                'dokumentasi' => [],
                'is_published' => true,
                'is_public_photo' => true,
            ],
            [
                'nama_kegiatan' => 'Senam Kebugaran Jasmani & Turnamen Futsal Ceria',
                'deskripsi' => '<p>Kegiatan olahraga pagi Minggu bersama seluruh pengasuh dan anak asuh, dilanjutkan pertandingan futsal persahabatan antar kelompok kamar.</p>',
                'tanggal_mulai' => Carbon::now()->subDays(28)->setTime(6, 30),
                'tanggal_selesai' => Carbon::now()->subDays(28)->setTime(9, 30),
                'tempat' => 'Lapangan Olahraga Panti',
                'kategori' => 'lainnya',
                'penanggung_jawab' => 'Rahmat Hidayatullah',
                'dokumentasi' => [],
                'is_published' => true,
                'is_public_photo' => true,
            ],
            [
                'nama_kegiatan' => 'Buka Puasa Bersama Para Donatur & Mitra Panti',
                'deskripsi' => '<p>Temu silaturahmi penuh berkah antara anak asuh dan para donatur panti asuhan, dilanjutkan dengan buka puasa bersama, sholat berjamaah, dan pembagian bingkisan.</p>',
                'tanggal_mulai' => Carbon::now()->subDays(35)->setTime(16, 30),
                'tanggal_selesai' => Carbon::now()->subDays(35)->setTime(19, 30),
                'tempat' => 'Aula Utama & Halaman Depan',
                'kategori' => 'keagamaan',
                'penanggung_jawab' => 'H. Muhammad Ridwan, S.E.',
                'dokumentasi' => [],
                'is_published' => true,
                'is_public_photo' => true,
            ],
            [
                'nama_kegiatan' => 'Kunjungan Edukasi (Outing Class) ke Museum & Kebun Binatang',
                'deskripsi' => '<p>Wisata edukatif pasca ujian semester untuk memperluas wawasan keanekaragaman flora/fauna serta sejarah nusantara bagi anak asuh tingkat SD dan SMP.</p>',
                'tanggal_mulai' => Carbon::now()->subDays(45)->setTime(7, 0),
                'tanggal_selesai' => Carbon::now()->subDays(45)->setTime(16, 0),
                'tempat' => 'Taman Margasatwa & Museum Sains',
                'kategori' => 'pendidikan',
                'penanggung_jawab' => 'Ustadz Farhan Al-Ghifari',
                'dokumentasi' => [],
                'is_published' => true,
                'is_public_photo' => true,
            ],
            [
                'nama_kegiatan' => 'Workshop Kerajinan Tangan Daur Ulang & Eco-Brick',
                'deskripsi' => '<p>Pelatihan kreativitas mengolah sampah plastik menjadi pot bunga hias dan bata ramah lingkungan (eco-brick) untuk mengajarkan kepedulian lingkungan sejak dini.</p>',
                'tanggal_mulai' => Carbon::now()->addDays(5)->setTime(14, 0),
                'tanggal_selesai' => Carbon::now()->addDays(5)->setTime(16, 30),
                'tempat' => 'Teras Gazebo Belakang Panti',
                'kategori' => 'keterampilan',
                'penanggung_jawab' => 'Nurul Hidayati, S.Pd.',
                'dokumentasi' => [],
                'is_published' => false,
                'is_public_photo' => false,
            ],
            [
                'nama_kegiatan' => 'Peringatan Hari Anak Nasional & Panggung Gembira',
                'deskripsi' => '<p>Pentas seni, lomba baca puisi, tari kreasi daerah, dan pertunjukan rebana yang dibawakan langsung oleh anak-anak asuh panti.</p>',
                'tanggal_mulai' => Carbon::now()->addDays(12)->setTime(8, 0),
                'tanggal_selesai' => Carbon::now()->addDays(12)->setTime(12, 30),
                'tempat' => 'Panggung Utama Panti Asuhan',
                'kategori' => 'sosial',
                'penanggung_jawab' => 'Drs. H. Ahmad Dahlan, M.Pd.',
                'dokumentasi' => [],
                'is_published' => false,
                'is_public_photo' => false,
            ],
        ];

        foreach ($kegiatans as $kegiatan) {
            Kegiatan::create($kegiatan);
        }
    }
}
