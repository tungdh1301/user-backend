<?php

namespace Database\Seeders;

use App\Models\Checkin;
use App\Models\Company;
use App\Models\Department;
use App\Models\Employee;
use App\Models\User;
use Database\Factories\CompanyFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        $this->call(DepartmentSeeder::class);
        Company::factory(2)->create();
        Employee::factory(10)->create();
        Checkin::factory(10)->create();
    }
}
