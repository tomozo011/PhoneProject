<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PlansTableSeeder::class);
        $this->call(NetsTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
        $this->call(TellsTableSeeder::class);
        $this->call(FamiliesTableSeeder::class);
        $this->call(CardsTableSeeder::class);
    }
}
