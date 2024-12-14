<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call the Seeders
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(SkillsTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        $this->call(ProjectsSkillsTableSeeder::class);
    }

    public static function addTimestemp(array &$items): void
    {
        foreach ($items as &$item) {
            $item['created_at'] = now();
            $item['updated_at'] = now();
        }
    }

}
