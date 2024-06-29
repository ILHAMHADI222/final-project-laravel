<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;

    // Jika tabel tidak mengikuti konvensi penamaan Laravel
    protected $table = 'alternatifs';

    // Tentukan kolom yang dapat diisi
    protected $fillable = [
        'jarak',
        'users_id',
        'sekolah_place_id_sekolah',
    ];

    // Definisikan relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    // Definisikan relasi ke model Sekolah
    public function sekolah()
    {
        return $this->belongsTo(SekolahPlace::class, 'sekolah_place_id_sekolah');
    }

    // Tentukan tipe data untuk casting
    protected $casts = [
        'jarak' => 'integer',
    ];

    // Tentukan primary key jika tidak menggunakan 'id'
    protected $primaryKey = 'id_alternatif';

    // Nonaktifkan auto-increment jika 'id_alternatif' tidak auto-increment
    public $incrementing = true;

    // Jika primary key bukan tipe integer
    protected $keyType = 'int';
}
