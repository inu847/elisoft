<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'Deviska Adi Nugroho',
            'email' => 'adin72978@gmail.com',
            'status' => 'ACTIVE',
            'password' => \Hash::make('Semogaberkah')
        ]);
        User::create([
            'username' => 'Krisna Giana Putra',
            'email' => 'krisna@gmail.com',
            'status' => 'ACTIVE',
            'password' => \Hash::make('Bismillah')
        ]);
        User::create([
            'username' => 'Wega Ayu',
            'email' => 'wegaayu@gmail.com',
            'status' => 'ACTIVE',
            'password' => \Hash::make('Alfatihah')
        ]);
        User::create([
            'username' => 'Zuanik',
            'email' => 'zuanik@gmail.com',
            'status' => 'ACTIVE',
            'password' => \Hash::make('Tadaruz')
        ]);
    }
}
