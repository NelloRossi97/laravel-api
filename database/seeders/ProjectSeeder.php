<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = config('projects');
        foreach ($projects as $project) {
            $newProject = new Project;
            $newProject->title = $project['title'];
            $newProject->slug = Str::slug($project['title'], '-');
            $newProject->description = $project['description'];
            $newProject->image = $project['image'];
            $newProject->save();
        }
    }
}