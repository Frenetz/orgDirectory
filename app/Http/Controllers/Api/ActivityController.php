<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ActivityService;
use App\Models\Activity;
use App\Http\Resources\{ActivityCollection, OrganizationCollection};

class ActivityController extends Controller
{
    function __construct(private ActivityService $activityService) {}

    function index(Request $request) {
        $activities = $this->activityService->index();
        return new ActivityCollection($activities);
    }

    function organizations(int $activity_id, Request $request) {
        $organizations = $this->activityService->getAllOrganizations($activity_id);
        return new OrganizationCollection($organizations);
    }
}
