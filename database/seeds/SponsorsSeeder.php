<?php

use App\Models\Sponsor;
use Faker\Factory;
use Illuminate\Database\Seeder;

class SponsorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sponsor::class, 20)->create();
    }
}
