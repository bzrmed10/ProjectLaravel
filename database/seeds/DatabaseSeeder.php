<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Post;
use App\Comment;
use App\CommentReply;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Post::truncate();
        Comment::truncate();
        // CommentReply::truncate();
        


        factory(User::class,10)->create();
        factory(Post::class,20)->create();
        factory(Comment::class,30)->create();
        // factory(CommentReply::class,30)->create();
    }
}
