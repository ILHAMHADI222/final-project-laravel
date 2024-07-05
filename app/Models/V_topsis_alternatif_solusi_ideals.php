<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class V_topsis_alternatif_solusi_ideals extends Model
{
    use HasFactory;

    protected $table = 'v_topsis_alternatif_solusi_ideal';

    public static function getData()
    {
        return self::all();
    }
}
