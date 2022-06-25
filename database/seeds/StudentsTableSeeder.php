<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            ['id' => 1, 'carrier'=>'ドコモ','name' => 'U30ロング割','min_age'=>0,'max_age' => 30,'price' => 3839,'plan_id' =>101,],
            ['id' => 2, 'carrier'=>'au','name' => 'au応援割','min_age'=>0,'max_age' => 30,'price' => 3938,'plan_id' =>201,],
            ['id' => 3, 'carrier'=>'UQ','name' => 'UQ応援割','min_age'=>5,'max_age' => 18,'price' => 1100,'plan_id' =>402,],
            ['id' => 4, 'carrier'=>'UQ','name' => 'UQ応援割','min_age'=>5,'max_age' => 18,'price' => 1100,'plan_id' =>403,],
            ['id' => 5, 'carrier'=>'Y!mobile','name' => 'ワイモバ親子割','min_age'=>5,'max_age' => 18,'price' => 1100,'plan_id' =>502,],
            ['id' => 6, 'carrier'=>'Y!mobile','name' => 'ワイモバ親子割','min_age'=>5,'max_age' => 18,'price' => 1100,'plan_id' =>503,]
        ]);
    }
}
