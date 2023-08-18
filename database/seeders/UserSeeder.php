<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'uuid' => '696c3054-f8d9-46a0-af9b-16c362319778',
            'name' => 'Kleyson de Melo Lopes',
            'document' => '97691402287',
            'email' => 'KleysonWerner@hotmail.com',
            'password' => '$2y$10$zJGcuaplaelx5Xm4vkYYRuW6GnmubbAFR4HXl.40hw/bLCwSFDy4q',
        ]);
    }
}
