<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Employee::insert([
            [
                'name' => 'Alexander Pratama',
                'position' => 'Senior Backend Engineer',
                'department' => 'Technology & Engineering',
                'salary' => 18500000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Siti Nurhaliza',
                'position' => 'Lead UI/UX Designer',
                'department' => 'Product Design',
                'salary' => 15000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Budi Santoso',
                'position' => 'Project Manager',
                'department' => 'Operations',
                'salary' => 17000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Clara Maharani',
                'position' => 'Talent Acquisition Specialist',
                'department' => 'Human Resources',
                'salary' => 11500000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dimas Arya',
                'position' => 'DevOps Specialist',
                'department' => 'Infrastructure',
                'salary' => 16000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
