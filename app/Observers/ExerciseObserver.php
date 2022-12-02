<?php

namespace App\Observers;

use App\Models\Exercise;
use App\Service\CodeService;

class ExerciseObserver
{
    public function creating(Exercise $exercise)
    {
        $code = new CodeService();
        $exercise->exercise_code = $code->generateExerciseCode($exercise->name);
    }
}
