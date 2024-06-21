<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SekolahPlace extends Model
{
    protected $table = 'sekolah_places';
    protected $primaryKey = 'id_sekolah'; // pastikan ini sesuai dengan nama kolom primary key Anda

    protected $fillable = [
        'nama_sekolah',
        'lokasi_sekolah',
        'link_image',
        'link_maps',
        'link_web',
        'fasilitas',
        'akreditasi',
        'biaya_bulanan',
        'extrakulikuler',
    ];
}
