<?php

namespace App\Services;

use App\Repositories\OrganizationRepository;
use App\Repositories\BuildingRepository;

class OrganizationService
{
    function __construct(private OrganizationRepository $organizationRepository,
                        private BuildingRepository $buildingRepository) {}

    function getAllOrganizations() {
        $organizations = $this->organizationRepository->getAllOrganizations();
        return $organizations;
    }

    function getOrganizationsByName(string $name) {
        $organization = $this->organizationRepository->getOrganizationsByName($name);
        return $organization;
    }

    function getOrganizationById(int $organization_id) {
        $organization = $this->organizationRepository->getOrganizationById($organization_id);
        return $organization;
    }

    function getOrganizationsInRadius(float $lat, float $long, float $radius) {
        $buildingsInRadius = $this->buildingRepository->getBuildingsInRadius($lat, $long, $radius);
        $organizations = $buildingsInRadius->flatMap(function($building) {
            return $building->organizations;
        });
        return $organizations;
    }

    function getOrganizationsInRectangle(float $min_lat, float $min_long, float $max_lat, float $max_long) {
        $buildingsInRectangle = $this->buildingRepository->getBuildingsInRectangle($min_lat, $min_long, $max_lat, $max_long);
        $organizations = $buildingsInRectangle->flatMap(function($building) {
            return $building->organizations;
        });
        return $organizations;   
    }
}
