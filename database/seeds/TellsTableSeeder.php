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
            ['id' => 1, 'carrier' => 'ドコモ','name' => '20円/30秒','price' => 0],
            ['id' => 2, 'carrier' => 'ドコモ','name' => '１回５分以内 無料','price' => 770],
            ['id' => 3, 'carrier' => 'ドコモ','name' => 'かけ放題','price' => 1870],

            ['id' => 4, 'carrier' => 'au','name' => '20円/30秒','price' => 0],
            ['id' => 5, 'carrier' => 'au','name' => '１回５分以内 無料','price' => 880],
            ['id' => 6, 'carrier' => 'au','name' => 'かけ放題','price' => 1980],

            ['id' => 7, 'carrier' => 'ソフトバンク','name' => '20円/30秒','price' => 0],
            ['id' => 8, 'carrier' => 'ソフトバンク','name' => '１回５分以内 無料','price' => 880],
            ['id' => 9,'carrier' => 'ソフトバンク','name' => 'かけ放題','price' => 1980],

            ['id' => 10, 'carrier' => 'UQ','name' => '20円/30秒','price' => 0],
            ['id' => 11, 'carrier' => 'UQ','name' => '月間60分未満 無料 (UQのみ)','price' => 550],
            ['id' => 12, 'carrier' => 'UQ','name' => '1回10分以内 無料','price' => 770],
            ['id' => 13, 'carrier' => 'UQ','name' => 'かけ放題','price' => 1870],

            ['id' => 14, 'carrier' => 'Y!mobile','name' => '20円/30秒','price' => 0],
            ['id' => 15, 'carrier' => 'Y!mobile','name' => '1回10分以内 無料','price' => 770],
            ['id' => 16, 'carrier' => 'Y!mobile','name' => 'かけ放題','price' => 1870]
        ]);
    }
}
