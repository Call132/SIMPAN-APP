<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('panti.tentang_kami', 'Tuliskan sejarah, visi, dan misi panti asuhan di sini.');
    }
};
