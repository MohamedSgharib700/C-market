<?php

use App\Models\Setting;
use Faker\Factory;
use Faker\Generator as Faker;

$factory->define(Setting::class, function (Faker $faker) {
    $arabicFaker = Factory::create('ar_SA');

    $setting = [
        'active'    => $faker->boolean,
        'image'    => $faker->URL(),
    ];

    foreach (Config::get('app.locales') as $lang => $language) {
        $faker = $lang == 'ar' ? $arabicFaker : $faker;
        $setting[$lang] = [
            'description'    => $faker->text(20),
        ];
    }

    return $setting;
});


