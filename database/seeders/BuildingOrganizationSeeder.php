<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Building;
use App\Models\Organization;

class BuildingOrganizationSeeder extends Seeder
{
    public function run(): void
    {
        $buildings = Building::all();
        $organizations = Organization::all();

        foreach ($organizations as $index => $org) {
            $building = $buildings->skip($index % $buildings->count())->first();
            $org->buildings()->attach($building->id, ['office_number' => (100 + $index) . 'A']);
        }
    }
}
