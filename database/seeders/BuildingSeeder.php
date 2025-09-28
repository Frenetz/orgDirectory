<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Building;

class BuildingSeeder extends Seeder
{
    public function run(): void
    {
        $buildings = [
            ['country' => 'USA', 'city' => 'New York', 'street' => '5th Avenue', 'house_number' => 100, 'building_block' => null, 'latitude' => 40.7128, 'longitude' => -74.0060],
            ['country' => 'USA', 'city' => 'Los Angeles', 'street' => 'Sunset Blvd', 'house_number' => 200, 'building_block' => 1, 'latitude' => 34.0522, 'longitude' => -118.2437],
            ['country' => 'UK', 'city' => 'London', 'street' => 'Baker Street', 'house_number' => 221, 'building_block' => null, 'latitude' => 51.5074, 'longitude' => -0.1278],
            ['country' => 'Germany', 'city' => 'Berlin', 'street' => 'Alexanderplatz', 'house_number' => 50, 'building_block' => 2, 'latitude' => 52.5200, 'longitude' => 13.4050],
            ['country' => 'Japan', 'city' => 'Tokyo', 'street' => 'Shinjuku', 'house_number' => 10, 'building_block' => null, 'latitude' => 35.6895, 'longitude' => 139.6917],
        ];

        foreach ($buildings as $building) {
            Building::create($building);
        }
    }
}
