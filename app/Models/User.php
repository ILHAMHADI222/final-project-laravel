<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    // Definisikan relasi ke model Alternatif
    public function alternatifs()
    {
        return $this->hasMany(Alternatif::class, 'users_id');
    }
    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id',
        'role',
        'email_verified_at',
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
}
$users = User::all();

foreach ($users as $user) {
    // Hanya meng-hash password jika belum di-hash
    if (!Hash::needsRehash($user->password)) {
        $user->password = Hash::make($user->password);
        $user->save();
    }
}
