<?php

use Illuminate\Database\Seeder;

class TellsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('tells')->insert([
            ['carrier' => 'ドコモ','name' => '20円/30秒','price' => 0],
            ['carrier' => 'ドコモ','name' => '１回５分以内 無料','price' => 770],
            ['carrier' => 'ドコモ','name' => 'かけ放題','price' => 1870],

            ['carrier' => 'au','name' => '20円/30秒','price' => 0],
            ['carrier' => 'au','name' => '１回５分以内 無料','price' => 880],
            ['carrier' => 'au','name' => 'かけ放題','price' => 1980],

            ['carrier' => 'ソフトバンク','name' => '20円/30秒','price' => 0],
            ['carrier' => 'ソフトバンク','name' => '１回５分以内 無料','price' => 880],
            ['carrier' => 'ソフトバンク','name' => 'かけ放題','price' => 1980],

            ['carrier' => 'UQ','name' => '20円/30秒','price' => 0],
            ['carrier' => 'UQ','name' => '月間60分未満 無料 (UQのみ)','price' => 550],
            ['carrier' => 'UQ','name' => '1回10分以内 無料','price' => 770],
            ['carrier' => 'UQ','name' => 'かけ放題','price' => 1870],

            ['carrier' => 'Y!mobile','name' => '20円/30秒','price' => 0],
            ['carrier' => 'Y!mobile','name' => '1回10分以内 無料','price' => 770],
            ['carrier' => 'Y!mobile','name' => 'かけ放題','price' => 1870]
        ]);
    }
}
