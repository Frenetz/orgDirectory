<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Activity;
use App\Models\Organization;

class ActivityOrganizationSeeder extends Seeder
{
    public function run(): void
    {
        $orgs = Organization::all();
        $activities = Activity::all();

        foreach ($orgs as $org) {
            $randomActivities = $activities->random(3);
            foreach ($randomActivities as $activity) {
                $org->activities()->attach($activity->id);
            }
        }
    }
}
