<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PanelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles=[
            'Admin',
            'User',
        ];
        foreach($roles as $role){
            \Spatie\Permission\Models\Role::create(['name' => $role]);
        }
    }
}
