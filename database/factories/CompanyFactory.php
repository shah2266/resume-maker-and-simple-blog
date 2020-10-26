<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'image'                 => $faker->imageUrl($width = 640, $height = 480),
        'company_name'          => $faker->name,
        'address'               => $faker->address,
        'email'                 => $faker->email,
        'phone'                 => '+8801777330633',
        'telephone'             => '+8802981737',
        'copy_right_text'       => 'All rights reserved | SSP',
        'social_link_icon_1'    => 'fa-facebook',
        'social_link_icon_2'    => 'fa-youtube',
        'social_link_icon_3'    => 'fa-twitter',
        'social_link_icon_4'    => 'fa-linkedin',
        'social_link_icon_5'    => 'fa-google-plus-square',
        'social_link1'          => 'https://www.facebook.com/',
        'social_link2'          => 'https://www.youtube.com/',
        'social_link3'          => 'https://www.twitter.com/',
        'social_link4'          => 'https://bd.linkedin.com/',
        'social_link5'          => 'https://www.google.com/',
        'latitude'              => $faker->randomFloat,
        'longitude'             => $faker->randomFloat,
        'map_content'           => 'SSP',
        'status'                => '0'
    ];
});
