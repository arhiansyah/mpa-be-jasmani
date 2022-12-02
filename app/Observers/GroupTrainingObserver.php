<?php

namespace App\Observers;

use App\Models\GroupTraining;
use App\Service\CodeService;

class GroupTrainingObserver
{
    public function creating(GroupTraining $group_training)
    {
        $code = new CodeService();
        $group_training->grouptraining_code = $code->GenerateGroupTrainingCode($group_training->name);
    }
}
