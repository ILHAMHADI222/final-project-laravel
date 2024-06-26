<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('CREATE OR REPLACE VIEW v_topsis_terbobots AS
            SELECT 
                `homelaun_ilhamhadi`.`v_topsis_normalisasis`.`id` AS `id`,
                `homelaun_ilhamhadi`.`v_topsis_normalisasis`.`nama_sekolah` AS `nama_sekolah`,
                (ABS(`homelaun_ilhamhadi`.`users`.`w1`) * `homelaun_ilhamhadi`.`v_topsis_normalisasis`.`r1`) AS `tb1`,
                (ABS(`homelaun_ilhamhadi`.`users`.`w2`) * `homelaun_ilhamhadi`.`v_topsis_normalisasis`.`r2`) AS `tb2`,
                (ABS(`homelaun_ilhamhadi`.`users`.`w3`) * `homelaun_ilhamhadi`.`v_topsis_normalisasis`.`r3`) AS `tb3`,
                (ABS(`homelaun_ilhamhadi`.`users`.`w4`) * `homelaun_ilhamhadi`.`v_topsis_normalisasis`.`r4`) AS `tb4`,
                (ABS(`homelaun_ilhamhadi`.`users`.`w5`) * `homelaun_ilhamhadi`.`v_topsis_normalisasis`.`r5`) AS `tb5`
            FROM 
                `homelaun_ilhamhadi`.`v_topsis_normalisasis`
                JOIN `homelaun_ilhamhadi`.`users` 
                ON `homelaun_ilhamhadi`.`v_topsis_normalisasis`.`id` = `homelaun_ilhamhadi`.`users`.`id`'
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('v_topsis_terbobots');
    }
};
