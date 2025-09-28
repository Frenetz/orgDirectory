<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Organization;

class OrganizationSeeder extends Seeder
{
    public function run(): void
    {
        Organization::create(['name' => 'GymPro']);
        Organization::create(['name' => 'Boxing Club']);
        Organization::create(['name' => 'Tech University']);
        Organization::create(['name' => 'Creative Art Center']);
        Organization::create(['name' => 'Robotics Lab']);
        Organization::create(['name' => 'Swimming Academy']);
        Organization::create(['name' => 'Online Learning Hub']);
    }
}
