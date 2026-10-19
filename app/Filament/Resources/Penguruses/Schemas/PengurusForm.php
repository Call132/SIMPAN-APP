<?php

namespace App\Filament\Resources\Penguruses\Schemas;

use App\Models\Pengurus;
use Closure;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PengurusForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required(),
                Select::make('jabatan')
                    ->options(Pengurus::getJabatanOptions())
                    ->required()
                    ->disableOptionWhen(function (string $value, ?Pengurus $record): bool {
                        if (! in_array($value, Pengurus::UNIQUE_JABATAN, true)) {
                            return false;
                        }

                        return Pengurus::where('jabatan', $value)
                            ->where('status_aktif', true)
                            ->when($record, fn ($query) => $query->where('id', '!=', $record->id))
                            ->exists();
                    })
                    ->rules([
                        fn ($get, $record): Closure => function (string $attribute, $value, Closure $fail) use ($get, $record) {
                            if (! in_array($value, Pengurus::UNIQUE_JABATAN, true)) {
                                return;
                            }

                            $isAktif = (bool) ($get('status_aktif') ?? true);
                            if (! $isAktif) {
                                return;
                            }

                            $exists = Pengurus::where('jabatan', $value)
                                ->where('status_aktif', true)
                                ->when($record, fn ($query) => $query->where('id', '!=', $record->id))
                                ->exists();

                            if ($exists) {
                                $fail("Jabatan {$value} sudah diisi oleh pengurus lain yang masih aktif.");
                            }
                        },
                    ]),
                TextInput::make('alamat'),
                TextInput::make('telepon')
                    ->tel(),
                DatePicker::make('tanggal_mulai_tugas'),
                Toggle::make('status_aktif')
                    ->default(true)
                    ->required()
                    ->rules([
                        fn ($get, $record): Closure => function (string $attribute, $value, Closure $fail) use ($get, $record) {
                            if (! $value) {
                                return;
                            }

                            $jabatan = $get('jabatan');
                            if (! $jabatan || ! in_array($jabatan, Pengurus::UNIQUE_JABATAN, true)) {
                                return;
                            }

                            $exists = Pengurus::where('jabatan', $jabatan)
                                ->where('status_aktif', true)
                                ->when($record, fn ($query) => $query->where('id', '!=', $record->id))
                                ->exists();

                            if ($exists) {
                                $fail("Tidak dapat mengaktifkan pengurus karena jabatan {$jabatan} sudah diisi oleh pengurus lain yang masih aktif.");
                            }
                        },
                    ]),
            ]);
    }
}
