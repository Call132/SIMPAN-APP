<?php

namespace Database\Seeders;

use App\Settings\PantiSettings;
use Illuminate\Database\Seeder;

class PantiSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = app(PantiSettings::class);

        $settings->sejarah_panti = <<<'HTML'
<p><strong>Panti Asuhan Safaz'ain</strong> didirikan pada tahun 2018 di Kota Gorontalo dengan niat tulus dan kepedulian mendalam terhadap masa depan anak-anak yatim, piatu, serta kaum dhuafa. Inisiatif pendirian panti ini berawal dari keprihatinan para pendiri yayasan terhadap anak-anak yang kehilangan pengasuhan orang tua serta keterbatasan sarana untuk mengenyam pendidikan dan kehidupan yang layak.</p>
<p>Bermula dari sebuah bangunan sederhana di kawasan Dembe Jaya dengan fasilitas bersahaja dan beberapa anak asuh pertama, panti ini berjalan atas dasar gotong royong para pengurus dan partisipasi masyarakat lokal. Ketulusan niat dan komitmen pengasuhan yang penuh kehangatan keluarga perlahan menggerakkan hati banyak pihak.</p>
<p>Seiring waktu dan meningkatnya kepercayaan para donatur, dermawan, serta muhsinin, Panti Asuhan Safaz'ain terus berbenah dan meningkatkan kualitas sarana maupun program pembinaan. Kini, panti tidak hanya menjadi tempat berteduh, melainkan juga wadah pembentukan karakter Qur'ani, bimbingan akademik, pemeriksaan kesehatan berkala, hingga pelatihan keterampilan mandiri agar setiap anak asuh dapat tumbuh dengan percaya diri dan meraih cita-cita terbaik mereka.</p>
HTML;

        $settings->visi_panti = <<<'HTML'
<p>Terwujudnya lembaga asuhan yang amanah, unggul, dan berdedikasi dalam membimbing dan mengantarkan anak-anak yatim, piatu, serta kaum dhuafa menjadi generasi yang berakhlak mulia, cerdas, bertakwa kepada Allah SWT, mandiri, dan berdaya guna bagi agama, masyarakat, dan bangsa.</p>
HTML;

        $settings->misi_panti = <<<'HTML'
<ol>
<li>Menyediakan tempat tinggal yang bersih, aman, sehat, dan penuh kasih sayang sebagai lingkungan pengganti keluarga yang harmonis bagi anak asuh.</li>
<li>Menjamin pemenuhan kebutuhan dasar jasmani dan rohani, termasuk gizi seimbang, fasilitas pelayanan kesehatan rutin, serta bimbingan ibadah harian.</li>
<li>Memberikan dan mendampingi akses pendidikan formal berkualitas dari tingkat dasar hingga jenjang yang lebih tinggi, serta pendidikan non-formal yang relevan.</li>
<li>Menanamkan nilai-nilai ajaran Islam, adab, akhlakul karimah, dan pembinaan tahfidz Al-Qur'an secara terpadu dan berkelanjutan.</li>
<li>Mengembangkan potensi bakat, minat, keterampilan hidup (<em>life skills</em>), literasi teknologi informasi, dan jiwa kewirausahaan guna menyiapkan kemandirian anak asuh di masa depan.</li>
<li>Membangun tata kelola kelembagaan dan pengelolaan amanah donasi publik yang transparan, akuntabel, dan profesional berbasis teknologi informasi.</li>
</ol>
HTML;

        $settings->save();
    }
}
