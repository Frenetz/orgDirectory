<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class BuildingOrganization extends Pivot
{
    protected $table = 'building_organization';

    protected $fillable = [
        'office_number',
        'building_id',
        'organization_id',
    ];
}