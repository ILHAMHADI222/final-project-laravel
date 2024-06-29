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
            `homelaun_ilhamhadi`.`sekolah_place`.`nama_sekolah` AS `nama_sekolah`,
            `homelaun_ilhamhadi`.`sekolah_place`.`extrakulikuler` AS `c1`,
            `homelaun_ilhamhadi`.`sekolah_place`.`biaya_bulanan` AS `c2`,
            `homelaun_ilhamhadi`.`sekolah_place`.`fasilitas` AS `c3`,
            `homelaun_ilhamhadi`.`sekolah_place`.`akreditasi` AS `c4`,
            `homelaun_ilhamhadi`.`alternatifs`.`jarak` AS `c5`
        FROM 
            (`homelaun_ilhamhadi`.`sekolah_place` 
            JOIN `homelaun_ilhamhadi`.`alternatifs` 
            ON (`homelaun_ilhamhadi`.`alternatifs`.`sekolah_place_id_sekolah` = `homelaun_ilhamhadi`.`sekolah_place`.`id_sekolah`)) 
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
