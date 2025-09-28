<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BuildingService;
use App\Http\Resources\{BuildingCollection, OrganizationCollection};
use App\Http\Requests\{NearbyRadiusRequest, NearbyRectangleRequest};

class BuildingController extends Controller
{
    function __construct(private BuildingService $buildingService) {}

    function index(Request $request) {
        $buildings = $this->buildingService->index();
        return new BuildingCollection($buildings);
    }

    function organizations(int $building_id, Request $request) {
        $organizations = $this->buildingService->getOrganizationsByBuildingId($building_id);
        if ($organizations === null) {
            return response()->json([
                "success" => false,
                "message" => "Building not found"
            ], 404);
        }
        return new OrganizationCollection($organizations);
    }

    function nearbyRadius(NearbyRadiusRequest $request) {
        $data = $request->validated();
        $buildings = $this->buildingService->getBuildingsInRadius(
            $data['lat'], $data['long'], $data['radius']
        );
        return new BuildingCollection($buildings);
    }

    function nearbyRectangle(NearbyRectangleRequest $request) {
        $data = $request->validated();
        $buildings = $this->buildingService->getBuildingsInRectangle(
            $data['min_lat'], $data['min_long'], $data['max_lat'], $data['max_long']
        );
        return new BuildingCollection($buildings);
    }
}
