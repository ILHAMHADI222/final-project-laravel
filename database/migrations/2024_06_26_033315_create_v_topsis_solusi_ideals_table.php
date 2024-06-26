<?php

use Illuminate\Database\Migrations\Migration;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('CREATE OR REPLACE VIEW v_topsis_solusi_ideal AS
            SELECT 
                `homelaun_ilhamhadi`.`v_topsis_terbobots`.`id` AS `id`,
                MAX(`homelaun_ilhamhadi`.`v_topsis_terbobots`.`tb1`) AS `ap_tb1`,
                MAX(`homelaun_ilhamhadi`.`v_topsis_terbobots`.`tb2`) AS `ap_tb2`,
                MAX(`homelaun_ilhamhadi`.`v_topsis_terbobots`.`tb3`) AS `ap_tb3`,
                MAX(`homelaun_ilhamhadi`.`v_topsis_terbobots`.`tb4`) AS `ap_tb4`,
                MIN(`homelaun_ilhamhadi`.`v_topsis_terbobots`.`tb5`) AS `ap_tb5`,
                MIN(`homelaun_ilhamhadi`.`v_topsis_terbobots`.`tb1`) AS `am_tb1`,
                MIN(`homelaun_ilhamhadi`.`v_topsis_terbobots`.`tb2`) AS `am_tb2`,
                MIN(`homelaun_ilhamhadi`.`v_topsis_terbobots`.`tb3`) AS `am_tb3`,
                MIN(`homelaun_ilhamhadi`.`v_topsis_terbobots`.`tb4`) AS `am_tb4`,
                MAX(`homelaun_ilhamhadi`.`v_topsis_terbobots`.`tb5`) AS `am_tb5`
            FROM `homelaun_ilhamhadi`.`v_topsis_terbobots`
            GROUP BY `homelaun_ilhamhadi`.`v_topsis_terbobots`.`id`'
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS v_topsis_alternatif_solusi_ideal');
    }
};
