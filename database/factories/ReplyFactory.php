<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Reply;
use Faker\Generator as Faker;
use Faker\Provider\Image;

$factory->define(Reply::class, function (Faker $faker) {
    return [
        'user_id' => App\User::all()->random()->id,
        'post_id' => App\Post::all()->random()->id,
        'reply' => $faker->paragraph,
        'attachment' => Image::image(storage_path() . '/app/replies', 200,200,'technics',false)
    ];
});
