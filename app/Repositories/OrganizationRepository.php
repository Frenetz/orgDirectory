<?php

namespace App\Repositories;

use App\Models\Organization;

class OrganizationRepository
{
    function getAllOrganizations() {
        return Organization::all();
    }

    function getOrganizationsByName(string $name) {
        return Organization::where("name", "like", "%{$name}%")->get();
    }

    function getOrganizationById(int $organization_id) {
        return Organization::find($organization_id);
    }
}