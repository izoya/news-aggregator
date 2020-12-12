<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use DB;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123'),
            'remember_token' => Str::random(10),
            'is_admin' =>true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::factory()->times(5)->create();
    }
}
