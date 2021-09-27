<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Role::create([
            'name' => 'Basic',
        ]);
        \App\Models\Role::create([
            'name' => 'Developer',
        ]);
        \App\Models\Role::create([
            'name' => 'Administrator',
        ]);
    }
}
