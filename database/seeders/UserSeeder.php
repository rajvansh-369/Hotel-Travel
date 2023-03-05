<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          if(!User::whereEmail('admin@hotel.com')->exists()){
            User::create([
                'name' => 'Gaurav',
                'email' => 'admin@hotelinbodhgaya.com',
                'password' => Hash::make('Bodhi@#123'),
                'phone' => '9546355003',
                'address' => 'Bodhgaya , Bihar',
            ]);
        }
    }
}
