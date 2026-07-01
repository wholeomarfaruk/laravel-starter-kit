<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderSeeder extends Seeder
{
    public function run(): void
    {
        $genders = [
            ['name' => 'Male',              'slug' => 'male',              'is_active' => true, 'sort_order' => 1],
            ['name' => 'Female',            'slug' => 'female',            'is_active' => true, 'sort_order' => 2],
            ['name' => 'Other',             'slug' => 'other',             'is_active' => true, 'sort_order' => 3],
            ['name' => 'Prefer not to say', 'slug' => 'prefer_not_to_say', 'is_active' => true, 'sort_order' => 4],
        ];

        foreach ($genders as $gender) {
            DB::table('genders')->updateOrInsert(
                ['slug' => $gender['slug']],
                array_merge($gender, ['updated_at' => now()])
            );
        }
    }
}
