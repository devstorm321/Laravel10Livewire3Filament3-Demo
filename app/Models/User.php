<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use HasFactory;
    use Searchable;

    protected $fillable = ['firstname', 'lastname', 'email', 'password'];

    protected $searchableFields = ['*'];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_secret',
        'two_factor_recovery_codes',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'two_factor_confirmed_at' => 'datetime',
    ];

    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }

    public function client()
    {
        return $this->hasOne(Client::class);
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }

    public function meetings()
    {
        return $this->belongsToMany(Meeting::class);
    }

    public function roles()
    {
        return $this->hasManyThrough(Role::class, Group::class);
    }

    public function isSuperAdmin(): bool
    {
        return in_array($this->email, config('auth.super_admins'));
    }
}
