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

        $this->call(UsersSeeder::class);
       // $this->call(UserSeeder::class);
        $this->call(SponsorsSeeder::class);
        $this->call(SettingsSeeder::class);
        
    }
}
