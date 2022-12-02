<?php

namespace App\Observers;

use App\Models\ProgramStudy;
use App\Service\CodeService;

class ProgramObservers
{
    public function creating(ProgramStudy $program){
        $code = new CodeService();
        $program->program_code = $code->GenerateProgramCode($program->name);
    }
}
