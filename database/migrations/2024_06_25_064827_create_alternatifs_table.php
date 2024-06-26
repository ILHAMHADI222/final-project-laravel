<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlternatifsTable extends Migration
{
    public function up()
    {
        Schema::create('alternatifs', function (Blueprint $table) {
            $table->id('id_alternatif');
            $table->integer('jarak')->nullable();
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('sekolah_place_id_sekolah');
            $table->timestamps(); // This will create created_at and updated_at columns
        });
    }

    public function down()
    {
        Schema::dropIfExists('alternatifs');
    }
}
