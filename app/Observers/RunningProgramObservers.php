<?php

namespace App\Observers;

use App\Models\RunningProgram;
use App\Service\CodeService;

class RunningProgramObservers
{
    public function creating(RunningProgram $program){
        $code = new CodeService();
        $program->running_program_code = $code->GenerateRunningProgramCode($program->name);
    }
}
