<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SekolahPlace extends Model
{
    public function alternatifs()
    {
        return $this->hasMany(Alternatif::class, 'sekolah_place_id_sekolah');
    }
    protected $table = 'sekolah_place';
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
