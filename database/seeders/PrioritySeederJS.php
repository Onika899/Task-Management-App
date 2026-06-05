<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrioritySeederJS extends Seeder
{
    public function run(): void
    {
        $priorities = [
            ['name' => 'Low', 'level' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Medium', 'level' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'High', 'level' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Urgent', 'level' => 4, 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('priorities')->insert($priorities);
    }
}
