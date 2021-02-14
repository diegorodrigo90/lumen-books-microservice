<?php

namespace Database\Seeders;

use Database\Seeders\BookSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->command->info("Books database starting seeding.");
        $this->call([BookSeeder::class]);
        $this->command->info("Books database seeded.");

    }
}
