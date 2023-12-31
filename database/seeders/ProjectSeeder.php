<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Admin\Project;

use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) { 
            $newProject = new Project();
            $newProject->title = $faker->sentence(3);
            $newProject->description = $faker->text(500);
            $newProject->img = $faker->imageUrl(640, 480, 'animals', true);
            $newProject->save();
        }
    }
}
