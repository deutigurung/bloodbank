<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Blog::class, function (Faker $faker) {
    return [
        'name' => $faker->title,
        'description' => $faker->text,
        'image' => '',
        'blog_category_id' => rand(1,2),
    ];
});
