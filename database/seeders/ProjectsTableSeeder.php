<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear the table before seeding
        Project::truncate();
        //DB::table("projects")->truncate();

        // Load skill list from file
        $projects = include database_path('seeders/data/projects.php');

        // Insert automatic the main skills
        DB::table("projects")->insert($projects);
    }
}
