<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'category_id'=>$faker->numberBetween(1,10),
        'title'=>$faker->sentence(),
        'slug'=>$faker->slug,
        'image_url'=>'https://picsum.photos/id/'.rand(1,100).'/600',
        'description'=>$faker->paragraph(),
        'user_id'=>$faker->numberBetween(1,10),
        'created_at'=>$faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now', $timezone = null),
    ];
});
