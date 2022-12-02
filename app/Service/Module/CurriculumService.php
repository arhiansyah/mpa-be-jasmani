<?php 
    
namespace App\Service\Module;

use App\Http\Requests\CurriculumRequest;
use App\Models\Curriculum;
use Illuminate\Support\Facades\Storage;

class CurriculumService{

    public function storeIconCurriculum(CurriculumRequest $request){
        $image = $request->file('icon');
        $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $path =  'icon/curriculum/' . $imageName;
        $image->storeAs('icon/curriculum/', $imageName, ['disk' => 'public']);
        return $path;
    }
    
    public function storeCoverCurriculum(CurriculumRequest $request){
        $image = $request->file('cover');
        $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $path =  'cover/curriculum/' . $imageName;
        $image->storeAs('cover/curriculum/', $imageName, ['disk' => 'public']);
        return $path;
    }

    public function updateIconCurriculum(CurriculumRequest $request, $id){
        //get data
        $curriculum = Curriculum::find($id);

        //delete photo first
        Storage::disk('public')->delete($curriculum->icon);
        
        //upload again
        $image = $request->file('icon');
        $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $path =  'icon/curriculum/' . $imageName;
        $image->storeAs('icon/curriculum/', $imageName, ['disk' => 'public']);
        return $path;
    }

    public function updateCoverCurriculum(CurriculumRequest $request, $id){
        //get data
        $curriculum = Curriculum::find($id);

        //delete photo first
        Storage::disk('public')->delete($curriculum->cover);
        
        //upload again
        $image = $request->file('cover');
        $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $path =  'icon/curriculum/' . $imageName;
        $image->storeAs('icon/curriculum/', $imageName, ['disk' => 'public']);
        return $path;
    }
}