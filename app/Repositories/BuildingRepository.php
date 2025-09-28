<?php

namespace App\Repositories;

use App\Models\Building;

class BuildingRepository
{
    function index() {
        return Building::all();
    }

    function getOrganizationsByBuildingId(int $building_id) {
        $building = Building::find($building_id);
        if (!$building) {
            return null;
        }
        return $building->organizations;
    }

    function getBuildingsInRadius(float $lat, float $long, float $radius) {
        $earthRadius = 6371;

        return Building::selectRaw(
                "*, (
                    $earthRadius * acos(
                        cos(radians(?)) * cos(radians(latitude)) *
                        cos(radians(longitude) - radians(?)) +
                        sin(radians(?)) * sin(radians(latitude))
                    )
                ) AS distance", [$lat, $long, $lat])
            ->having("distance", "<=", $radius)
            ->orderBy("distance")
            ->get();
    }

    
    function getBuildingsInRectangle(float $min_lat, float $min_long, float $max_lat, float $max_long) {
        return Building::where("latitude", ">=", $min_lat)
                            ->where("latitude", "<=", $max_lat)
                            ->where("longitude", ">=", $min_long)
                            ->where("longitude", "<=", $max_long)
                            ->get();
    }
}