<?php

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Coding', 'Travel', 'Lifestyle', 'Gaming', 'Photography', 'NSFW', 'Food Porn'];

        foreach ($categories as $category) {
            $cat = new Category();
            $cat->name = $category;
            $cat->slug = Str::slug($category, '-');
            $cat->save();
        }
    }
}