<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = config('tags.tags');
        foreach ($tags as $tag) {
            $newTag = new Tag();
            $newTag->title = $tag;
            $newTag->save();
        }
    }
}