<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class V_Bobot extends Model
{
    use HasFactory;

    protected $table = 'v_bobots';

    public static function getData()
    {
        return self::all();
    }
}
