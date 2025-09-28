<?php

namespace App\Repositories;

use App\Models\Activity;

class ActivityRepository
{
    function index() {
        return Activity::all();
    }

    function organizations(int $activity_id) {
        $activity = Activity::find($activity_id);
        return $activity->organizations;
    }

    function getActivityWithChildren(int $activity_id) {
        return Activity::with("children")->find($activity_id);
    }
}