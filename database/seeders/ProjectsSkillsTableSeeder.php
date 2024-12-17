<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectsSkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear the table before seeding
        DB::table("projects_skills")->truncate();

        // Load skill list from file
        $projectsSkills = include database_path('seeders/data/projects_skills.php');

        // Insert automatic the main skills
        DB::table("projects_skills")->insert($projectsSkills);
    }
}
