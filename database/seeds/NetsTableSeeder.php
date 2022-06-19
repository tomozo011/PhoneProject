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
            ['carrier'=>'ドコモ','name' => 'ドコモ光/ドコモホームルーター','price' => 1100,'plan_id' =>101],
            ['carrier'=>'ドコモ', 'name' => 'ドコモ光/ドコモホームルーター','price' => 550,'plan_id' =>102],
            ['carrier'=>'ドコモ', 'name' => 'ドコモ光/ドコモホームルーター','price' => 550,'plan_id' =>102],
            ['carrier'=>'ドコモ', 'name' => 'ドコモ光/ドコモホームルーター','price' => 550,'plan_id' =>102],
            ['carrier'=>'ドコモ', 'name' => 'ドコモ光/ドコモホームルーター','price' => 550,'plan_id' =>102],

// au
            ['carrier'=>'au', 'name' => 'au光/eo光','price' => 1100,'plan_id' =>201],
            ['carrier'=>'au', 'name' => 'au光/eo光','price' => 550,'plan_id' =>202],
            ['carrier'=>'au', 'name' => 'au光/eo光','price' => 550,'plan_id' =>202],
            ['carrier'=>'au', 'name' => 'au光/eo光','price' => 550,'plan_id' =>20],

// SB
            ['carrier'=>'ソフトバンク', 'name' => 'ソフトバンク光/ソフトバンクAir','price' => 1100,'plan_id' =>301],
            ['carrier'=>'ソフトバンク', 'name' => 'ソフトバンク光/ソフトバンクAir','price' => 550,'plan_id' =>302],
            ['carrier'=>'ソフトバンク', 'name' => 'ソフトバンク光/ソフトバンクAir','price' => 550,'plan_id' =>302],
            ['carrier'=>'ソフトバンク', 'name' => 'ソフトバンク光/ソフトバンクAir','price' => 550,'plan_id' =>302],


// UQ
            ['carrier'=>'UQ', 'name' => 'au光/eo光','price' => 1100,'plan_id' =>401],
            ['carrier'=>'UQ', 'name' => 'au光/eo光','price' => 1100,'plan_id' =>402],
            ['carrier'=>'UQ', 'name' => 'au光/eo光','price' => 1100,'plan_id' =>403],

// YM
            ['carrier'=>'Y!mobile', 'name' => 'ソフトバンク光/ソフトバンクAir','price' => 1100,'plan_id' =>501],
            ['carrier'=>'Y!mobile', 'name' => 'ソフトバンク光/ソフトバンクAir','price' => 1100,'plan_id' =>502],
            ['carrier'=>'Y!mobile', 'name' => 'ソフトバンク光/ソフトバンクAir','price' => 1100,'plan_id' =>503],

        ]);
    }
}
