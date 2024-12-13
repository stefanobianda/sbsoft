<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear the table before seeding
        Skill::truncate();
        //DB::table("skills")->truncate();

        // Load skill list from file
        $skills = include database_path('seeders/data/skills.php');

        // Insert automatic the main skills
        DB::table("skills")->insert($skills);
    }
}
