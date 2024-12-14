<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear the table before seeding
        Category::truncate();

        // Load skill list from file
        $categories = include database_path('seeders/data/categories.php');

        DatabaseSeeder::addTimestemp($categories);
        
        // Insert automatic the main categories
        DB::table("categories")->insert($categories);
    }

}
