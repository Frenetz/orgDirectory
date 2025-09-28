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
        if ($organizations === null) {
            return response()->json([
                'success' => false,
                'message' => 'Activity not found',
            ], 404);
        }        
        return new OrganizationCollection($organizations);
    }
}
