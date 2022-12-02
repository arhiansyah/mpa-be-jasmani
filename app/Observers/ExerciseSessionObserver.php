<?php

namespace App\Observers;

use App\Models\ExerciseSession;
use App\Service\CodeService;

class ExerciseSessionObserver
{
    public function creating(ExerciseSession $exercise_session)
    {
        $code = new CodeService();
        $exercise_session->exercisersession_code = $code->GenerateExerciseSessionCode($exercise_session->name);
    }
}
