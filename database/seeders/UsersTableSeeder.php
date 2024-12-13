<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear the table before seeding
        User::truncate();

        // Insert automatic admin user
        DB::table('users')->insert([
            'name'=> env('APP_USERNAME'),
            'email'=> env('APP_EMAIL'),
            'password'=> bcrypt(env('APP_PASSWORD')),
            'email_verified_at'=> Carbon::now(),
            ]);

    }
}
