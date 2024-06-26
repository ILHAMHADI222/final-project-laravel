<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class V_Alternatif extends Model
{
    use HasFactory;

    protected $table = 'v_alternatifs';

    public static function getData()
    {
        return self::all();
    }
}
