<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Department;
use App\Models\Manager;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        for ($i=1; $i < 11; $i++) {
            Department::query()->create([
                'name' => 'Department '. $i,
            ]);
            Manager::query()->create([
                'name' => 'Manager '. $i,
            ]);
        }
    }
}
