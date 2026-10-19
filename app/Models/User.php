<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password', 'role'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    public const ROLE_ADMIN = 'admin';
    public const ROLE_KEPALA_PANTI = 'kepala_panti';
    public const ROLE_PENGURUS = 'pengurus';
    public const ROLE_PENGASUH = 'pengasuh';

    public static function getRoleOptions(): array
    {
        return [
            self::ROLE_ADMIN => 'Admin',
            self::ROLE_KEPALA_PANTI => 'Kepala Panti',
            self::ROLE_PENGURUS => 'Pengurus Panti',
            self::ROLE_PENGASUH => 'Pengasuh',
        ];
    }

    public static function getAssignableRoleOptions(): array
    {
        return [
            self::ROLE_KEPALA_PANTI => 'Kepala Panti',
            self::ROLE_PENGURUS => 'Pengurus Panti',
            self::ROLE_PENGASUH => 'Pengasuh',
        ];
    }

    public function isAdmin(): bool
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function isKepalaPanti(): bool
    {
        return $this->role === self::ROLE_KEPALA_PANTI;
    }

    public function isPengurus(): bool
    {
        return $this->role === self::ROLE_PENGURUS;
    }

    public function isPengasuh(): bool
    {
        return $this->role === self::ROLE_PENGASUH;
    }

    public function hasRole(string|array $roles): bool
    {
        return in_array($this->role, (array) $roles, true);
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return in_array($this->role, [
            self::ROLE_ADMIN,
            self::ROLE_KEPALA_PANTI,
            self::ROLE_PENGURUS,
            self::ROLE_PENGASUH,
        ]);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
