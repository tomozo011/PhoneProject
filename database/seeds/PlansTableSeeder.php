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
            ['plan_id' =>101,'carrier'=>'ドコモ','name' => 'ギガホ　プレミアム','min_GB'=>0,'max_GB' => 60,'price' => 7205],
            ['plan_id' =>102,'carrier'=>'ドコモ','name' => 'ギガライト','min_GB'=>0,'max_GB' => 1,'price' => 3150],
            ['plan_id' =>102,'carrier'=>'ドコモ','name' => 'ギガライト','min_GB'=>1,'max_GB' => 3,'price' => 4150],
            ['plan_id' =>102,'carrier'=>'ドコモ','name' => 'ギガライト','min_GB'=>3,'max_GB' => 5,'price' => 5150],
            ['plan_id' =>102,'carrier'=>'ドコモ','name' => 'ギガライト','min_GB'=>5,'max_GB' => 7,'price' => 6150],

            ['plan_id' =>201,'carrier'=>'au','name' => '使い放題MAX','min_GB'=>0,'max_GB' => 999,'price' => 7238],
            ['plan_id' =>202,'carrier'=>'au','name' => 'ピタットプラン','min_GB'=>0,'max_GB' => 1,'price' => 3465],
            ['plan_id' =>202,'carrier'=>'au','name' => 'ピタットプラン','min_GB'=>1,'max_GB' => 4,'price' => 5115],
            ['plan_id' =>202,'carrier'=>'au','name' => 'ピタットプラン','min_GB'=>4,'max_GB' => 7,'price' => 6765],

            ['plan_id' =>301,'carrier'=>'ソフトバンク','name' => 'メリハリ無制限','min_GB'=>0,'max_GB' => 999,'price' => 7238],
            ['plan_id' =>302,'carrier'=>'ソフトバンク','name' => 'ミニフィットプラン＋','min_GB'=>0,'max_GB' => 1,'price' => 3278],
            ['plan_id' =>302,'carrier'=>'ソフトバンク','name' => 'ミニフィットプラン＋','min_GB'=>1,'max_GB' => 2,'price' => 4378],
            ['plan_id' =>302,'carrier'=>'ソフトバンク','name' => 'ミニフィットプラン＋','min_GB'=>2,'max_GB' => 3,'price' => 5478],

            ['plan_id' =>401,'carrier'=>'UQ','name' => 'くりこしプランS','min_GB'=>0,'max_GB' => 3,'price' => 1628],
            ['plan_id' =>402,'carrier'=>'UQ','name' => 'くりこしプランM','min_GB'=>3,'max_GB' => 15,'price' => 2728],
            ['plan_id' =>403,'carrier'=>'UQ','name' => 'くりこしプランL','min_GB'=>15,'max_GB' => 25,'price' => 3828],

            ['plan_id' =>501,'carrier'=>'Y!mobile','name' => 'シンプルS','min_GB'=>0,'max_GB' => 5,'price' => 2178],
            ['plan_id' =>502,'carrier'=>'Y!mobile','name' => 'シンプルM','min_GB'=>3,'max_GB' => 15,'price' => 3278],
            ['plan_id' =>503,'carrier'=>'Y!mobile','name' => 'シンプルL','min_GB'=>15,'max_GB' => 25,'price' => 4158]
            ]);

    }
}
