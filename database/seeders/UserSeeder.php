<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('users')->insert([
        //     [ 'username' => 'Nguyen Van A', 'email' => 'nguyenvana@example.com', 'created_at' => now() ],
        //     [ 'username' => 'Tran Thi B', 'email' => 'tranthib@example.com', 'created_at' => now() ],
        //     [ 'username' => 'Le Van C', 'email' => 'levanc@example.com', 'created_at' => now() ]
        // ]);

        User::factory()->count(5)->create();
    }
}
