<?php

use Illuminate\Database\Migrations\Migration;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('CREATE OR REPLACE VIEW v_topsis_normalisasis AS
        SELECT 
            `homelaun_ilhamhadi`.`v_alternatifs`.`id` AS `id`,
            `homelaun_ilhamhadi`.`v_alternatifs`.`nama_sekolah` AS `nama_sekolah`,
            (`homelaun_ilhamhadi`.`v_alternatifs`.`c1` / `homelaun_ilhamhadi`.`v_topsis_pembagis`.`pb_c1`) AS `r1`,
            (`homelaun_ilhamhadi`.`v_alternatifs`.`c2` / `homelaun_ilhamhadi`.`v_topsis_pembagis`.`pb_c2`) AS `r2`,
            (`homelaun_ilhamhadi`.`v_alternatifs`.`c3` / `homelaun_ilhamhadi`.`v_topsis_pembagis`.`pb_c3`) AS `r3`,
            (`homelaun_ilhamhadi`.`v_alternatifs`.`c4` / `homelaun_ilhamhadi`.`v_topsis_pembagis`.`pb_c4`) AS `r4`,
            (`homelaun_ilhamhadi`.`v_alternatifs`.`c5` / `homelaun_ilhamhadi`.`v_topsis_pembagis`.`pb_c5`) AS `r5`
        FROM 
            (`homelaun_ilhamhadi`.`v_alternatifs`
            JOIN `homelaun_ilhamhadi`.`v_topsis_pembagis`)'
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS v_topsis_normalisasis');
    }
};
