<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = config('types.technologies');
        foreach ($types as $type) {
            $newType = new Type;
            $newType->name = $type['name'];
            $newType->slug = Str::slug($type['name'], '-');
            $newType->image = $type['image'];
            $newType->description = $type['description'];
            $newType->save();
        }
    }
}