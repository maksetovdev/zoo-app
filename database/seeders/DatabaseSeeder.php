<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Region;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // AdminFactory::factory(1)->create();
        // SuperAdminFactory::factory(1)->create();

        // \App\Models\User::create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
            Region::create([
                'name' => [
                    "kar" => "Nokis qalasi",
                    "en" => "Nukus City",
                    "uz" => "Nukus shahri",
                    "ru" => "Город Нукус"
                ]
            ]);

            User::create([
            'username' => 'superadmin',
            'phone' => '123',
            'region_id' => 1,
            'password' => Hash::make('superadminpassword'),
            'role' => 'superadmin',
            ]);

            User::create([
            'username' => 'admin',
            'phone' => '123',
            'region_id' => 1,
            'password' => Hash::make('adminpassword'),
            'role' => 'admin',
            ]);

            Category::create([
                'name' => 'At', 
                'img_name' => 'at.png'
            ]);
            
            Category::create([
                'name' => 'Eshki', 
                'img_name' => 'eshki.png'
            ]);
            
            Category::create([
                'name' => 'Iyt', 
                'img_name' => 'iyt.png'
            ]);
            
            Category::create([
                'name' => 'Mal', 
                'img_name' => 'mal.png'
            ]);

            Category::create([
                'name' => 'Tawiq', 
                'img_name' => 'tawiq.png'
            ]);
            
            Category::create([
                'name' => 'Toti', 
                'img_name' => 'toti.png'
            ]);

            Category::create([
                'name' => 'Tuyetawiq', 
                'img_name' => 'tuyetawiq.png'
            ]);
            
            
        }
}
