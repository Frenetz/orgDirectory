<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $table = 'buildings';

    public function organizations()
    {
        return $this->belongsToMany(Organization::class, 'building_organization')
                    ->using(BuildingOrganization::class)
                    ->withPivot(['office_number']);
    }
}
