<?php

namespace App\Service\Module;

use App\Http\Requests\ExerciseRequest;
use App\Models\Exercise;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

/**
 * Class ExerciseService
 * @package App\Services
 */
class ExerciseService
{
    public function storeAnimationExercise(ExerciseRequest $request)
    {
        $image = $request->file('animation');
        $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $path =  'animation/exercise/' . $imageName;
        $image->storeAs('animation/exercise/', $imageName, ['disk' => 'public']);
        return $path;
    }
    public function storeVideoExercise(ExerciseRequest $request)
    {
        $image = $request->file('video');
        $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $path =  'video/exercise/' . $imageName;
        $image->storeAs('video/exercise/', $imageName, ['disk' => 'public']);
        return $path;
    }
    public function storeIconExercise(ExerciseRequest $request)
    {
        $image = $request->file('icon');
        // $storeStorage = Http::acceptJson()->attach('icon', file_get_contents($image), 'png/jpg/jpeg')->post('http://127.0.0.1:8002/api/v1/icon', [
        //     'icon' => $image,
        //     'module' => "exercise"
        // ]);
        // dd($storeStorage->object());
        $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
        // $imageName = $storeStorage[''] . "." . $image->getClientOriginalExtension();
        // $imageName = $storeStorage['data']['name'] . $image->getClientOriginalExtension();
        // $imageLink = $storeStorage['link'] . $image->getClientOriginalExtension();
        // dd($imageName);
        $image->storeAs('icon/exercise/', $imageName, ['disk' => 'public']);
        // $path = $imageLink;
        // dd($path);
        $path =  'icon/exercise/' . $imageName;
        // dd($imageName);
        return $path;
    }

    public function storeCoverExercise(ExerciseRequest $request)
    {
        $image = $request->file('cover');
        $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $path =  'cover/exercise/' . $imageName;
        $image->storeAs('cover/exercise/', $imageName, ['disk' => 'public']);
        return $path;
    }

    public function updateIconExercise(ExerciseRequest $request, $id)
    {
        //get data
        $exercise = Exercise::find($id);

        //delete photo first
        Storage::disk('public')->delete($exercise->icon);

        //upload again
        $image = $request->file('icon');
        $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $path =  'icon/exercise/' . $imageName;
        $image->storeAs('icon/exercise/', $imageName, ['disk' => 'public']);
        return $path;
    }

    public function updateCoverExercise(ExerciseRequest $request, $id)
    {
        //get data
        $exercise = Exercise::find($id);

        //delete photo first
        Storage::disk('public')->delete($exercise->cover);

        //upload again
        $image = $request->file('cover');
        $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $path =  'cover/exercise/' . $imageName;
        $image->storeAs('cover/exercise/', $imageName, ['disk' => 'public']);
        return $path;
    }
    public function updateVideoExercise(ExerciseRequest $request, $id)
    {
        //get data
        $exercise = Exercise::find($id);

        //delete photo first
        Storage::disk('public')->delete($exercise->video);

        //upload again
        $image = $request->file('video');
        $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $path =  'video/exercise/' . $imageName;
        $image->storeAs('video/exercise/', $imageName, ['disk' => 'public']);
        return $path;
    }
    public function updateAnimationExercise(ExerciseRequest $request, $id)
    {
        //get data
        $exercise = Exercise::find($id);

        //delete photo first
        Storage::disk('public')->delete($exercise->animation);

        //upload again
        $image = $request->file('animation');
        $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $path =  'animation/exercise/' . $imageName;
        $image->storeAs('animation/exercise/', $imageName, ['disk' => 'public']);
        return $path;
    }
}
