<?php

namespace App\Services;

use App\Repositories\ActivityRepository;

class ActivityService
{
    function __construct(private ActivityRepository $activityRepository) {}

    function index() {
        return $this->activityRepository->index();
    }

    function getAllOrganizations(int $activity_id) {
        $activityWithChildren = $this->activityRepository->getActivityWithChildren($activity_id);
        $activities = $this->flattenActivities([$activityWithChildren]);
        return collect($activities)->flatMap(fn($activity) => $activity->organizations);
    }

    function flattenActivities(array $activities): array
    {
        $flat = [];

        foreach ($activities as $activity) {
            $item = $activity;
            unset($item['children']);
            $flat[] = $item;

            if (!empty($activity->children) && $activity->children->count() > 0) {
                $flat = array_merge($flat, $this->flattenActivities($activity->children->all()));
            }
        }

        return $flat;
    }
}
