<?php

namespace App\Observers;

use App\Models\Curriculum;
use App\Service\CodeService;

class CurriculumObservers
{
    public function creating(Curriculum $curriculum){
        $code = new CodeService();
        $curriculum->curriculum_code = $code->generateCurriculumCode($curriculum->name);
    }
}
