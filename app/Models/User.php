<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 
        'email', 
        'password', 
        'role', 
        'phone', 
        'address',
        'jenis_kelamin'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pendaftaran()
    {
        return $this->hasOne(Pendaftaran::class);
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isPanitia()
    {
        return $this->role === 'panitia';
    }

    public function isSiswa()
    {
        return $this->role === 'siswa';
    }
}