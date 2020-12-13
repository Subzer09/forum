<?php

use App\Forum;
use App\Post;
use App\Reply;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create(['email' => 'jimmy@correo.com']);
        factory(User::class, 50)->create();
        factory(Forum::class, 5)->create();
        factory(Post::class, 10)->create();
        factory(Reply::class, 100)->create();
    }
}
