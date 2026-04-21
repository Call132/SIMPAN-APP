<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->delete('panti.tentang_kami');
        $this->migrator->add('panti.sejarah_panti', '<p>Sejarah panti asuhan kami dimulai dari...</p>');
        $this->migrator->add('panti.visi_panti', '<p>Visi utama panti asuhan kami adalah...</p>');
        $this->migrator->add('panti.misi_panti', '<ol><li>Misi 1</li><li>Misi 2</li></ol>');
    }
};
