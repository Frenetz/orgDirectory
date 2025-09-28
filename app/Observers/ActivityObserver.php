<?php

namespace App\Observers;

use App\Models\Activity;
use Illuminate\Validation\ValidationException;

class ActivityObserver
{
    /**
     * Handle the Activity "creating" event (before saving to DB).
     */
    public function creating(Activity $activity)
    {
        $depth = $this->calculateDepth($activity);
        \Log::info("creating depth: " . $depth);

        if ($depth > 3) {
            throw ValidationException::withMessages([
                'parent_id' => 'Максимальная глубина вложенности категорий — 3.',
            ]);
        }
    }

    /**
     * Handle the Activity "updating" event (before saving to DB).
     */
    public function updating(Activity $activity)
    {
        $depth = $this->calculateDepth($activity);
        \Log::info("updating depth: " . $depth);

        if ($depth > 3) {
            throw ValidationException::withMessages([
                'parent_id' => 'Максимальная глубина вложенности категорий — 3.',
            ]);
        }
    }

    private function calculateDepth(Activity $activity): int
    {
        $depth = 1;
        $parent = $activity->parent;

        while ($parent) {
            $depth++;
            $parent = $parent->parent;
        }

        return $depth;
    }

    /**
     * Handle the Activity "deleted" event.
     */
    public function deleted(Activity $activity): void
    {
        //
    }

    /**
     * Handle the Activity "restored" event.
     */
    public function restored(Activity $activity): void
    {
        //
    }

    /**
     * Handle the Activity "force deleted" event.
     */
    public function forceDeleted(Activity $activity): void
    {
        //
    }
}