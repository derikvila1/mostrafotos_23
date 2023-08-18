<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Application;
use Illuminate\Database\Seeder;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Application::create([
            'id' => 1,
            'name' => 'Single Sign On',
            'enabled' => true,
            'description' => 'Gestor de autenticações e permissões',
            'url' => 'sso' . env('SESSION_DOMAIN'),
            'admin_url' => 'sso' . env('SESSION_DOMAIN'),
        ]);
    }
}
