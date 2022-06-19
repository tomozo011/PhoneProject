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
            ['carrier' => 'ドコモ', 'name'=>'dカード', 'price' => 187, 'plan_id'=>101],
            ['carrier' => 'au', 'name'=>'auPayカード', 'price' => 187, 'plan_id'=>201]
        ]);
    }
}
