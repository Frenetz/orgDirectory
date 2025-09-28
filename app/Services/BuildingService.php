<?php

namespace App\Services;

use App\Repositories\BuildingRepository;

class BuildingService
{
    function __construct(private BuildingRepository $buildingRepository) {}

    function index() {
        $buildings = $this->buildingRepository->index();
        return $buildings;
    }

    function getOrganizationsByBuildingId(int $building_id) {
        $organizations = $this->buildingRepository->getOrganizationsByBuildingId($building_id);
        return $organizations;
    }

    function getBuildingsInRadius(float $lat, float $long, float $radius) {
        return $this->buildingRepository->getBuildingsInRadius($lat, $long, $radius);
    }

    function getBuildingsInRectangle(float $min_lat, float $min_long, float $max_lat, float $max_long) {
        return $this->buildingRepository->getBuildingsInRectangle($min_lat, $min_long, $max_lat, $max_long);
    }
}
