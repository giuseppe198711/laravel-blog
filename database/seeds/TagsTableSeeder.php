<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            "html",
            "css",
            "js",
            "php",
            "framework",
            "laravel",
            "template engine",
            "linux",
            "design pattern"
        ];

        foreach($tags as $tag) {

            $newTag = new Tag;
            $newTag->name = $tag;
            $newTag->save();
        }
    }
}
