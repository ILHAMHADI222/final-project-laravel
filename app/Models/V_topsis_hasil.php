<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class V_topsis_hasil extends Model
{
    use HasFactory;

    protected $table = 'v_topsis_hasil';
    protected $fillable = [
        'id', // Add other fillable columns if needed
        'nama_sekolah',
        'hasil',
    ];

    public static function getData()
    {
        return self::all();
    }
}
