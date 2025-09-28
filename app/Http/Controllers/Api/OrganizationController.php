<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\OrganizationService;
use App\Http\Resources\{OrganizationCollection, OrganizationResource};
use App\Http\Requests\{IndexOrganizationRequest, NearbyRadiusRequest, NearbyRectangleRequest};

class OrganizationController extends Controller
{
    function __construct(private OrganizationService $organizationService) {}

    function index(IndexOrganizationRequest $request) {
        $data = $request->validated();
        if (!empty($data)) {
            $organizations = $this->organizationService->getOrganizationsByName($data['name']);
        } else {
            $organizations = $this->organizationService->getAllOrganizations();
        }
        return new OrganizationCollection($organizations);
    }

    function show(int $organization_id, Request $request) {
        $organization = $this->organizationService->getOrganizationById($organization_id);
        return new OrganizationCollection([$organization]);
    }

    function nearbyRadius(NearbyRadiusRequest $request) {
        $data = $request->validated();
        $organizations = $this->organizationService->getOrganizationsInRadius(
            $data['lat'], $data['long'], $data['radius']
        );
        return new OrganizationCollection($organizations);
    }

    function nearbyRectangle(NearbyRectangleRequest $request) {
        $data = $request->validated();
        $organizations = $this->organizationService->getOrganizationsInRectangle(
            $data['min_lat'], $data['min_long'], $data['max_lat'], $data['max_long']
        );
        return new OrganizationCollection($organizations);       
    }
}
