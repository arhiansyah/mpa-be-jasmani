<?php

namespace App\Service\Module;

use App\Http\Requests\ExerciseRequest;
use App\Http\Requests\TrainingRequest;
use App\Models\Exercise;
use App\Models\Training;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

/**
 * Class ExerciseService
 * @package App\Services
 */
class TrainingService
{

    public function storeVideoTraining(TrainingRequest $request)
    {
        $image = $request->file('video_intro');
        $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $path =  'video/trainings/' . $imageName;
        $image->storeAs('video/trainings/', $imageName, ['disk' => 'public']);
        return $path;
    }

    public function updateVideoTraining(TrainingRequest $request, $id)
    {
        //get data
        $training = Training::find($id);

        //delete photo first
        Storage::disk('public')->delete($training->video_intro);

        //upload again
        $image = $request->file('video_intro');
        $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $path =  'video/trainings/' . $imageName;
        $image->storeAs('video/trainings/', $imageName, ['disk' => 'public']);
        return $path;
    }
}
