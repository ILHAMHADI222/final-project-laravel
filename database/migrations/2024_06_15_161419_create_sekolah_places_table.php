<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sekolah_place', function (Blueprint $table) {
            $table->id('id_sekolah');
            $table->string('nama_sekolah', 40);
            $table->string('lokasi_sekolah');
            $table->string('link_image', 2048); // Ubah panjang sesuai kebutuhan
            $table->string('link_maps', 2048);  // Ubah panjang sesuai kebutuhan
            $table->string('link_web', 2048);   // Ubah panjang sesuai kebutuhan
            $table->integer('fasilitas');
            $table->integer('akreditasi');
            $table->integer('biaya_bulanan');
            $table->integer('extrakulikuler');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sekolah_place');
    }
};
