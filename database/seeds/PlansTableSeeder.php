<?php

use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('plans')->insert([
            ['id' => 1, 'plan_id' =>101,'carrier'=>'ドコモ','name' => 'ギガホ　プレミアム','min_GB'=>0,'max_GB' => 60,'price' => 7205],
            ['id' => 2, 'plan_id' =>102,'carrier'=>'ドコモ','name' => 'ギガライト','min_GB'=>0,'max_GB' => 1,'price' => 3465],
            ['id' => 3,'plan_id' =>102,'carrier'=>'ドコモ','name' => 'ギガライト','min_GB'=>1,'max_GB' => 3,'price' => 4565],
            ['id' => 4,'plan_id' =>102,'carrier'=>'ドコモ','name' => 'ギガライト','min_GB'=>3,'max_GB' => 5,'price' => 5665],
            ['id' => 5,'plan_id' =>102,'carrier'=>'ドコモ','name' => 'ギガライト','min_GB'=>5,'max_GB' => 7,'price' => 6765],

            ['id' => 6,'plan_id' =>201,'carrier'=>'au','name' => '使い放題MAX','min_GB'=>0,'max_GB' => 999,'price' => 7238],
            ['id' => 7,'plan_id' =>202,'carrier'=>'au','name' => 'ピタットプラン','min_GB'=>0,'max_GB' => 1,'price' => 3465],
            ['id' => 8,'plan_id' =>202,'carrier'=>'au','name' => 'ピタットプラン','min_GB'=>1,'max_GB' => 4,'price' => 5115],
            ['id' => 9,'plan_id' =>202,'carrier'=>'au','name' => 'ピタットプラン','min_GB'=>4,'max_GB' => 7,'price' => 6765],

            ['id' => 10, 'plan_id' =>301,'carrier'=>'ソフトバンク','name' => 'メリハリ無制限','min_GB'=>0,'max_GB' => 999,'price' => 7238],
            ['id' => 11,'plan_id' =>302,'carrier'=>'ソフトバンク','name' => 'ミニフィットプラン＋','min_GB'=>0,'max_GB' => 1,'price' => 3278],
            ['id' => 12,'plan_id' =>302,'carrier'=>'ソフトバンク','name' => 'ミニフィットプラン＋','min_GB'=>1,'max_GB' => 2,'price' => 4378],
            ['id' => 13,'plan_id' =>302,'carrier'=>'ソフトバンク','name' => 'ミニフィットプラン＋','min_GB'=>2,'max_GB' => 3,'price' => 5478],

            ['id' => 14, 'plan_id' =>401,'carrier'=>'UQ','name' => 'くりこしプランS','min_GB'=>0,'max_GB' => 3,'price' => 1628],
            ['id' => 15, 'plan_id' =>402,'carrier'=>'UQ','name' => 'くりこしプランM','min_GB'=>3,'max_GB' => 15,'price' => 2728],
            ['id' => 16, 'plan_id' =>403,'carrier'=>'UQ','name' => 'くりこしプランL','min_GB'=>15,'max_GB' => 25,'price' => 3828],

            ['id' => 17, 'plan_id' =>501,'carrier'=>'Y!mobile','name' => 'シンプルS','min_GB'=>0,'max_GB' => 5,'price' => 2178],
            ['id' => 18, 'plan_id' =>502,'carrier'=>'Y!mobile','name' => 'シンプルM','min_GB'=>3,'max_GB' => 15,'price' => 3278],
            ['id' => 19, 'plan_id' =>503,'carrier'=>'Y!mobile','name' => 'シンプルL','min_GB'=>15,'max_GB' => 25,'price' => 4158]
            ]);

    }
}
