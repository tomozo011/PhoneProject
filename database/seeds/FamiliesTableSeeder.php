<?php

use Illuminate\Database\Seeder;

class FamiliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('families')->insert([
            ['id' => 1, 'member' => 2,'price' => 550],
            ['id' => 2, 'member' => 3,'price' => 1100]
        ]);
    }
}
