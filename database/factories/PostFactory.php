<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Forum;
use App\Post;
use App\User;
use Faker\Generator as Faker;
use Faker\Provider\Image;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->sentence;
    return [
        'user_id' => User::all()->random()->id,
        'forum_id' => Forum::all()->random()->id,
        'title' => $title,
        "slug" => Str::slug($title,'-'),
        'description' => $faker->paragraph,
        'attachment' => Image::image(storage_path() . '/app/posts', 200,200,'technics',false)
    ];
});
