<?php

use Illuminate\Database\Seeder;

class CardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cards')->insert([
            ['id' => 1, 'carrier' => 'ドコモ', 'name'=>'dカード', 'price' => 187, 'plan_id'=>101],
            ['id' => 2, 'carrier' => 'au', 'name'=>'auPayカード', 'price' => 110, 'plan_id'=>201]
        ]);
    }
}
