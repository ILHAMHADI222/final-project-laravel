<?php

use Illuminate\Database\Migrations\Migration;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('CREATE OR REPLACE VIEW v_alternatifs AS
        SELECT 
            `homelaun_ilhamhadi`.`users`.`id` AS `id`,
            `homelaun_ilhamhadi`.`sekolah_places`.`nama_sekolah` AS `nama_sekolah`,
            `homelaun_ilhamhadi`.`sekolah_places`.`extrakulikuler` AS `c1`,
            `homelaun_ilhamhadi`.`sekolah_places`.`biaya_bulanan` AS `c2`,
            `homelaun_ilhamhadi`.`sekolah_places`.`fasilitas` AS `c3`,
            `homelaun_ilhamhadi`.`sekolah_places`.`akreditasi` AS `c4`,
            `homelaun_ilhamhadi`.`alternatifs`.`jarak` AS `c5`
        FROM 
            (`homelaun_ilhamhadi`.`sekolah_places` 
            JOIN `homelaun_ilhamhadi`.`alternatifs` 
            ON (`homelaun_ilhamhadi`.`alternatifs`.`sekolah_place_id_sekolah` = `homelaun_ilhamhadi`.`sekolah_places`.`id_sekolah`)) 
            JOIN `homelaun_ilhamhadi`.`users` 
            ON (`homelaun_ilhamhadi`.`alternatifs`.`users_id` = `homelaun_ilhamhadi`.`users`.`id`)'
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS v_alternatifs');
    }
};
