<?php

use Illuminate\Database\Seeder;

class NetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nets')->insert([
            ['id' => 1, 'carrier'=>'ドコモ','name' => 'ドコモ光/ドコモホームルーター','price' => 1100,'plan_id' =>101],
            ['id' => 2, 'carrier'=>'ドコモ', 'name' => 'ドコモ光/ドコモホームルーター','price' => 550,'plan_id' =>102],
            ['id' => 3, 'carrier'=>'ドコモ', 'name' => 'ドコモ光/ドコモホームルーター','price' => 550,'plan_id' =>102],
            ['id' => 4, 'carrier'=>'ドコモ', 'name' => 'ドコモ光/ドコモホームルーター','price' => 550,'plan_id' =>102],
            ['id' => 5, 'carrier'=>'ドコモ', 'name' => 'ドコモ光/ドコモホームルーター','price' => 550,'plan_id' =>102],

// au
            ['id' => 6, 'carrier'=>'au', 'name' => 'au光/eo光','price' => 1100,'plan_id' =>201],
            ['id' => 7, 'carrier'=>'au', 'name' => 'au光/eo光','price' => 550,'plan_id' =>202],
            ['id' => 8, 'carrier'=>'au', 'name' => 'au光/eo光','price' => 550,'plan_id' =>202],
            ['id' => 9, 'carrier'=>'au', 'name' => 'au光/eo光','price' => 550,'plan_id' =>202],

// SB
            ['id' => 10, 'carrier'=>'ソフトバンク', 'name' => 'ソフトバンク光/ソフトバンクAir','price' => 1100,'plan_id' =>301],
            ['id' => 11, 'carrier'=>'ソフトバンク', 'name' => 'ソフトバンク光/ソフトバンクAir','price' => 550,'plan_id' =>302],
            ['id' => 12, 'carrier'=>'ソフトバンク', 'name' => 'ソフトバンク光/ソフトバンクAir','price' => 550,'plan_id' =>302],
            ['id' => 13,'carrier'=>'ソフトバンク', 'name' => 'ソフトバンク光/ソフトバンクAir','price' => 550,'plan_id' =>302],


// UQ
            ['id' => 14, 'carrier'=>'UQ', 'name' => 'au光/eo光','price' => 638,'plan_id' =>401],
            ['id' => 15, 'carrier'=>'UQ', 'name' => 'au光/eo光','price' => 638,'plan_id' =>402],
            ['id' => 16, 'carrier'=>'UQ', 'name' => 'au光/eo光','price' => 858,'plan_id' =>403],

// YM
            ['id' => 17, 'carrier'=>'Y!mobile', 'name' => 'ソフトバンク光/ソフトバンクAir','price' => 1188,'plan_id' =>501],
            ['id' => 18, 'carrier'=>'Y!mobile', 'name' => 'ソフトバンク光/ソフトバンクAir','price' => 1188,'plan_id' =>502],
            ['id' => 19, 'carrier'=>'Y!mobile', 'name' => 'ソフトバンク光/ソフトバンクAir','price' => 1188,'plan_id' =>503],

        ]);
    }
}
