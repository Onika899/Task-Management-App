<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeederJS extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Work', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Personal', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bug', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Feature', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Research', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('categories')->insert($categories);
    }
}
