<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\BannerType;
use Faker\Generator as Faker;

$factory->define(BannerType::class, function (Faker $faker) {
    return [
        'active_value' => 'slider',
        'status' => '1',
    ];
});
