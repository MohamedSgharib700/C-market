<?php

use App\Models\Sponsor;
use Faker\Factory;
use Faker\Generator as Faker;

$factory->define(Sponsor::class, function (Faker $faker) {
    $arabicFaker = Factory::create('ar_SA');
    $sponsors = Sponsor::whereRaw('(`_lft`+1)', '`_rgt`')->get();
    $sponsor = [
        'image' => $faker->imageUrl(),
        'active'    => $faker->boolean,
    ];
    foreach (Config::get('app.locales') as $lang => $language) {
        $faker = $lang == 'ar' ? $arabicFaker : $faker;
        $sponsor[$lang] = [
            'name'    => $faker->name,
        ];
    }
    return $sponsor;
});


