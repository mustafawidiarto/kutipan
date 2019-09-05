<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Quote;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Quote::class, function (Faker $faker) {
    $users = User::all()->toArray();
    
    return [
        'judul' => $faker->title,
        'slug' =>  str_slug($faker->title),
        'subject' => $faker->jobTitle,
        'user_id' => $faker->randomElement($users),
    ];
});
