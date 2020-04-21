<?php
use App\Role;
use App\Category;
use App\Photo;
use App\Post;
use App\User;
use App\Comment;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(60),
        'role_id' => Role::all()->random()->id,
        'is_active' => $faker->randomElement([0,1]),
        'photo_id'  => Photo::all()->random()->id,
    ];
});


$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'title' => str_random(10),
        'body' => $faker->paragraph,
        'user_id' => User::all()->random()->id,
        'category_id' => Category::all()->random()->id,
        'photo_id'  => Photo::all()->random()->id,
    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    return [

        'body' => $faker->paragraph,
        'author' => User::all()->random()->name,
        'photo'  => function (array $comment) {
            return User::where('name', $comment['author'])->first()->photo->file;
        },
        'email' => function (array $comment) {
            return User::where('name', $comment['author'])->first()->email;
        },
        'post_id'  => Post::all()->random()->id,
        'is_active' => $faker->randomElement([0,1]),
    ];
});
