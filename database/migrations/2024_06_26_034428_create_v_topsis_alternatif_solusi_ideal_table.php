<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class() extends Migration {
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        DB::statement('CREATE OR REPLACE VIEW v_topsis_alternatif_solusi_ideal AS
            SELECT 
                `homelaun_ilhamhadi`.`v_topsis_terbobots`.`id` AS `id`,
                `homelaun_ilhamhadi`.`v_topsis_terbobots`.`nama_sekolah` AS `nama_sekolah`,
                SQRT(
                    POW((`homelaun_ilhamhadi`.`v_topsis_solusi_ideal`.`ap_tb1` - `homelaun_ilhamhadi`.`v_topsis_terbobots`.`tb1`), 2) + 
                    POW((`homelaun_ilhamhadi`.`v_topsis_solusi_ideal`.`ap_tb2` - `homelaun_ilhamhadi`.`v_topsis_terbobots`.`tb2`), 2) + 
                    POW((`homelaun_ilhamhadi`.`v_topsis_solusi_ideal`.`ap_tb3` - `homelaun_ilhamhadi`.`v_topsis_terbobots`.`tb3`), 2) + 
                    POW((`homelaun_ilhamhadi`.`v_topsis_solusi_ideal`.`ap_tb4` - `homelaun_ilhamhadi`.`v_topsis_terbobots`.`tb4`), 2) + 
                    POW((`homelaun_ilhamhadi`.`v_topsis_solusi_ideal`.`ap_tb5` - `homelaun_ilhamhadi`.`v_topsis_terbobots`.`tb5`), 2)
                ) AS `dp`,
                SQRT(
                    POW((`homelaun_ilhamhadi`.`v_topsis_terbobots`.`tb1` - `homelaun_ilhamhadi`.`v_topsis_solusi_ideal`.`am_tb1`), 2) + 
                    POW((`homelaun_ilhamhadi`.`v_topsis_terbobots`.`tb2` - `homelaun_ilhamhadi`.`v_topsis_solusi_ideal`.`am_tb2`), 2) + 
                    POW((`homelaun_ilhamhadi`.`v_topsis_terbobots`.`tb3` - `homelaun_ilhamhadi`.`v_topsis_solusi_ideal`.`am_tb3`), 2) + 
                    POW((`homelaun_ilhamhadi`.`v_topsis_terbobots`.`tb4` - `homelaun_ilhamhadi`.`v_topsis_solusi_ideal`.`am_tb4`), 2) + 
                    POW((`homelaun_ilhamhadi`.`v_topsis_terbobots`.`tb5` - `homelaun_ilhamhadi`.`v_topsis_solusi_ideal`.`am_tb5`), 2)
                ) AS `dm`
            FROM 
                `homelaun_ilhamhadi`.`v_topsis_terbobots`
                JOIN `homelaun_ilhamhadi`.`v_topsis_solusi_ideal` 
                ON `homelaun_ilhamhadi`.`v_topsis_terbobots`.`id` = `homelaun_ilhamhadi`.`v_topsis_solusi_ideal`.`id`'
        );
    }

    /**
     * Balikkan migrasi.
     */
    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS v_alternatif_solusi_ideal');
    }
};
