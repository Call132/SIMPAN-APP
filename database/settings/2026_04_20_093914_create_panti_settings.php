<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('panti.nama_panti', "Panti Asuhan Safaz'ain");
        $this->migrator->add('panti.alamat', 'Jl. Cinta Kasih No. 12, Panti Asuhan');
        $this->migrator->add('panti.kota', 'Jakarta');
        $this->migrator->add('panti.kode_pos', '10110');
        $this->migrator->add('panti.telepon', '081234567890');
        $this->migrator->add('panti.email', 'kontak@safazain.org');
        $this->migrator->add('panti.maps_embed_url', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126915.75168019318!2d106.74565780516641!3d-6.242784556488392!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3ef42379b33%3A0xe5e15822365efabe!2sJakarta%20Selatan%2C%20Kota%20Jakarta%20Selatan%2C%20Daerah%20Khusus%20Ibukota%20Jakarta!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid');
        
        $this->migrator->add('panti.nomor_rekening', '1234567890');
        $this->migrator->add('panti.atas_nama', "Yayasan Safaz'ain");
        $this->migrator->add('panti.nama_bank', 'Bank Mandiri');
        
        $this->migrator->add('panti.logo_path', null);
    }
};
