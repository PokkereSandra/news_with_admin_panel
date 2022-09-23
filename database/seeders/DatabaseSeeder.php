<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
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
        $this->call(UsersTableSeeder::class);

            User::factory(10)->create()->each(function ($user) {
                Article::factory(3)->create(['user_id' => $user->id])->each(function ($user) {
                    Comment::factory(2)->create();
                });
            });
    }
}
