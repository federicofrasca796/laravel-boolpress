<?php

use App\Models\Post;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 15; $i++) {
            $newpost = new Post();
            $newpost->title = $faker->sentence(3);
            $newpost->sub_title = $faker->sentence(5);
            $newpost->slug = Str::slug($newpost->title);
            $newpost->cover = $faker->imageUrl(1200, 480, 'Posts', true, $newpost->title);
            $newpost->body = $faker->paragraphs(10, true);
            $newpost->save();
        }
    }
}