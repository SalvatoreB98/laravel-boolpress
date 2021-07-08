<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Post;
use Faker\Generator as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $newPost = new Post();
            $newPost->title =  $faker->sentence(10, 25);
            $newPost->body =  $faker->paragraph(50, 50);
            $newPost->url =  $faker->imageUrl($width = 640, $height = 480);
            $newPost->category_id =  rand(1, 7);
            $newPost->save();
        }
    }
}
