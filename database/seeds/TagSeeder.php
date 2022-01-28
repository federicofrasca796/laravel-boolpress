<?php

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['Important', 'Announcement', 'NSFW', 'News', 'Flash News', 'Help'];

        foreach ($tags as $tag) {
            $t = new Tag();
            $t->name = $tag;
            $t->slug = Str::slug($tag, '-');
            $t->save();
        }
    }
}