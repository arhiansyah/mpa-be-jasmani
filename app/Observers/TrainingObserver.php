<?php

namespace App\Observers;

use App\Models\Training;
use App\Service\CodeService;

class TrainingObserver
{
    public function creating(Training $training)
    {
        $code = new CodeService();
        $training->training_code = $code->generateTrainingCode($training->name);
    }
}
