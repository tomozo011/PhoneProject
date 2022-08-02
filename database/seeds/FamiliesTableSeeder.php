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
            ['id' => 2, 'member' => 3,'price' => 1100],

            // YM
            ['id' => 3, 'member' => 2,'price' => 1188],
            ['id' => 4, 'member' => 3,'price' => 1188],
            ['id' => 5, 'member' => 4,'price' => 1188],

            // SB
            ['id' => 6, 'member' => 2,'price' => 660],
            ['id' => 7, 'member' => 2,'price' => 1210],
        ]);
    }
}
