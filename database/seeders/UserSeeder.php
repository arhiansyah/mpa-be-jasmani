<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        collect([
            [
                'name' => 'admin',
                'username' => 'admin',
                'email' => 'admin@test.com',
                'password' => bcrypt('password'),
            ],
        ])->each(function ($data) {
            User::create($data);
        });
    }
}
