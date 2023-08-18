<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\GrantedPermission;
use Illuminate\Database\Seeder;

class GrantedPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GrantedPermission::create([
            'user' => '696c3054-f8d9-46a0-af9b-16c362319778',
            'permission' => 101,
            'grant_date' => now(),
            'granted_by' => '696c3054-f8d9-46a0-af9b-16c362319778',
        ]);
    }
}
