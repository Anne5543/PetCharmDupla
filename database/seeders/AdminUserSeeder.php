<?php 
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123@'),
                'user_type' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Admin2',
                'email' => 'admin2@gmail.com',
                'password' => bcrypt('admin2123@'),
                'user_type' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Admin3',
                'email' => 'admin3@gmail.com',
                'password' => bcrypt('admin3123@'),
                'user_type' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
        
    }
}

    


