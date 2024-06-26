<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('CREATE OR REPLACE VIEW v_bobots AS
            SELECT 
                `homelaun_ilhamhadi`.`users`.`id` AS `id`,
                (`homelaun_ilhamhadi`.`users`.`w1` / (
                    (ABS(`homelaun_ilhamhadi`.`users`.`w1`) + 
                     ABS(`homelaun_ilhamhadi`.`users`.`w2`) + 
                     ABS(`homelaun_ilhamhadi`.`users`.`w3`) + 
                     ABS(`homelaun_ilhamhadi`.`users`.`w4`) + 
                     ABS(`homelaun_ilhamhadi`.`users`.`w5`)
                    )
                )) AS `w1`,
                (`homelaun_ilhamhadi`.`users`.`w2` / (
                    (ABS(`homelaun_ilhamhadi`.`users`.`w1`) + 
                     ABS(`homelaun_ilhamhadi`.`users`.`w2`) + 
                     ABS(`homelaun_ilhamhadi`.`users`.`w3`) + 
                     ABS(`homelaun_ilhamhadi`.`users`.`w4`) + 
                     ABS(`homelaun_ilhamhadi`.`users`.`w5`)
                    )
                )) AS `w2`,
                (`homelaun_ilhamhadi`.`users`.`w3` / (
                    (ABS(`homelaun_ilhamhadi`.`users`.`w1`) + 
                     ABS(`homelaun_ilhamhadi`.`users`.`w2`) + 
                     ABS(`homelaun_ilhamhadi`.`users`.`w3`) + 
                     ABS(`homelaun_ilhamhadi`.`users`.`w4`) + 
                     ABS(`homelaun_ilhamhadi`.`users`.`w5`)
                    )
                )) AS `w3`,
                (`homelaun_ilhamhadi`.`users`.`w4` / (
                     (ABS(`homelaun_ilhamhadi`.`users`.`w1`) + 
                     ABS(`homelaun_ilhamhadi`.`users`.`w2`) + 
                     ABS(`homelaun_ilhamhadi`.`users`.`w3`) + 
                     ABS(`homelaun_ilhamhadi`.`users`.`w4`) + 
                     ABS(`homelaun_ilhamhadi`.`users`.`w5`)
                    )
                )) AS `w4`,
                (`homelaun_ilhamhadi`.`users`.`w5` / (
                   (ABS(`homelaun_ilhamhadi`.`users`.`w1`) + 
                     ABS(`homelaun_ilhamhadi`.`users`.`w2`) + 
                     ABS(`homelaun_ilhamhadi`.`users`.`w3`) + 
                     ABS(`homelaun_ilhamhadi`.`users`.`w4`) + 
                     ABS(`homelaun_ilhamhadi`.`users`.`w5`)
                    )
                )) AS `w5`
            FROM `homelaun_ilhamhadi`.`users`'
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('v__bobots');
    }
};
