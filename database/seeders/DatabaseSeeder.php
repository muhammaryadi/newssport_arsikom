<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
  
         DB::table('roles')->insert([
            ['nama' => 'Admin'],
        ]);

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@arsikom.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role_id' => 1, // assuming 1 is the role_id for Admin
            'remember_token' => \Illuminate\Support\Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
