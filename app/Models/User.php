<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Providers\Filament\AdminPanelProvider;
use Filament\Panel;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Providers\Filament\AdminPanelProvider as AdminPanel;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function canAccessPanel(Panel $panel): bool
    {
        $user = Auth::user();

        if ($panel->getId() === 'admin' && $this->hasRole('Admin')) {
            return true;
        } else if ($panel->getId() === 'user' && $this->hasRole('Admin') === false) {
            return true;
        } else {
            return false;
        }
    }

/*    public function canAccessPanel(Panel $panel): bool
    {
        $user = Auth::user();
        $roles = $user->getRoleNames();

        if ($panel->getId() === 'admin' && $->roles->contains('admin')) {
            return true;
        } else if ($panel->getId() === 'admin' && $->roles->contains('user')) {
            return true;
        } else {
            return false;
        }
    } */
}
