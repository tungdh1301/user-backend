<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::create(['name' => 'Phòng A', 'company_id' => 1]);
        Department::create(['name' => 'Phòng B', 'company_id' => 2]);
        Department::create(['name' => 'Phòng C', 'company_id' => 2]);
        Department::factory(5)->create();
    }
}
