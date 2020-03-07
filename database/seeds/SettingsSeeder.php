<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Faker\Factory;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory( Setting::class,20)->create();
    }
}
