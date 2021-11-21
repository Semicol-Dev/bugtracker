<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'Administrator',
            'email' => 'administrator@no-reply',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'role_id' => '3',
            'picture' => 'none',
        ]);
    }
}
