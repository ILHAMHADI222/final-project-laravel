<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('CREATE OR REPLACE VIEW v_topsis_hasil AS
            SELECT 
                `homelaun_ilhamhadi`.`v_topsis_alternatif_solusi_ideal`.`id` AS `id`,
                `homelaun_ilhamhadi`.`v_topsis_alternatif_solusi_ideal`.`nama_sekolah` AS `nama_sekolah`,
                (`homelaun_ilhamhadi`.`v_topsis_alternatif_solusi_ideal`.`dm` / 
                (`homelaun_ilhamhadi`.`v_topsis_alternatif_solusi_ideal`.`dm` + 
                `homelaun_ilhamhadi`.`v_topsis_alternatif_solusi_ideal`.`dp`)) AS `hasil`
            FROM `homelaun_ilhamhadi`.`v_topsis_alternatif_solusi_ideal`
            ORDER BY `hasil` DESC'
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS v_topsis_hasil');
    }
};
