<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $table = 'organizations';

    public function buildings()
    {
        return $this->belongsToMany(Building::class, 'building_organization')
                    ->using(BuildingOrganization::class)
                    ->withPivot(['office_number']);
    }

    public function phones() {
        return $this->hasMany(Phone::class);
    }

    public function activities() {
        return $this->belongsToMany(Activity::class);
    }
}
