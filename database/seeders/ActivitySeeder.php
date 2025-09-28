<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Activity;

class ActivitySeeder extends Seeder
{
    public function run(): void
    {
        // Level 1
        $sport = Activity::create(['name' => 'Sport']);
        $education = Activity::create(['name' => 'Education']);
        $art = Activity::create(['name' => 'Art']);
        $technology = Activity::create(['name' => 'Technology']);

        // Level 2
        $fitness = Activity::create(['name' => 'Fitness', 'parent_id' => $sport->id]);
        $boxing = Activity::create(['name' => 'Boxing', 'parent_id' => $sport->id]);
        $swimming = Activity::create(['name' => 'Swimming', 'parent_id' => $sport->id]);

        $school = Activity::create(['name' => 'School', 'parent_id' => $education->id]);
        $university = Activity::create(['name' => 'University', 'parent_id' => $education->id]);
        $onlineCourses = Activity::create(['name' => 'Online Courses', 'parent_id' => $education->id]);

        $painting = Activity::create(['name' => 'Painting', 'parent_id' => $art->id]);
        $sculpture = Activity::create(['name' => 'Sculpture', 'parent_id' => $art->id]);
        $music = Activity::create(['name' => 'Music', 'parent_id' => $art->id]);

        $programming = Activity::create(['name' => 'Programming', 'parent_id' => $technology->id]);
        $robotics = Activity::create(['name' => 'Robotics', 'parent_id' => $technology->id]);
        $ai = Activity::create(['name' => 'Artificial Intelligence', 'parent_id' => $technology->id]);

        // Level 3
        Activity::create(['name' => 'Yoga', 'parent_id' => $fitness->id]);
        Activity::create(['name' => 'Crossfit', 'parent_id' => $fitness->id]);
        Activity::create(['name' => 'Kickboxing', 'parent_id' => $boxing->id]);

        Activity::create(['name' => 'Python Programming', 'parent_id' => $programming->id]);
        Activity::create(['name' => 'Web Development', 'parent_id' => $programming->id]);
        Activity::create(['name' => 'Machine Learning', 'parent_id' => $ai->id]);
    }
}
