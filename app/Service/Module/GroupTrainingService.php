<?php

namespace App\Service\Module;

use App\Http\Requests\GroupTrainingRequest;
use App\Models\GroupTraining;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

/**
 * Class ExerciseService
 * @package App\Services
 */
class GroupTrainingService
{
    public function storeIconGroupTraining(GroupTrainingRequest $request)
    {
        $image = $request->file('icon');
        // $storeStorage = Http::acceptJson()->attach('icon', file_get_contents($image), 'png/jpg/jpeg')->post('http://localhost:8080/gan-storage/public/api/v1/icon', [
        //     'icon' => $image,
        //     'module' => "exercise"
        // ]);
        // dd($storeStorage->object());
        $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
        // $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $path =  'icon/group-training/' . $imageName;
        $image->storeAs('icon/group-training/', $imageName, ['disk' => 'public']);
        // dd($imageName);
        return $path;
    }

    public function storeCoverGroupTraining(GroupTrainingRequest $request)
    {
        $image = $request->file('cover');
        $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $path =  'cover/group-training/' . $imageName;
        $image->storeAs('cover/group-training/', $imageName, ['disk' => 'public']);
        return $path;
    }

    public function updateIconGroupTraining(GroupTrainingRequest $request, $id)
    {
        //get data
        $groupTraining = GroupTraining::find($id);

        //delete photo first
        Storage::disk('public')->delete($groupTraining->icon);

        //upload again
        $image = $request->file('icon');
        $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $path =  'icon/group-training/' . $imageName;
        $image->storeAs('icon/group-training/', $imageName, ['disk' => 'public']);
        return $path;
    }

    public function updateCoverGroupTraining(GroupTrainingRequest $request, $id)
    {
        //get data
        $groupTraining = GroupTraining::find($id);

        //delete photo first
        Storage::disk('public')->delete($groupTraining->cover);

        //upload again
        $image = $request->file('cover');
        $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $path =  'cover/group-training/' . $imageName;
        $image->storeAs('cover/group-training/', $imageName, ['disk' => 'public']);
        return $path;
    }
}
