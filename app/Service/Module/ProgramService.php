<?php 

namespace App\Service\Module;

use App\Http\Requests\ProgramRequest;
use App\Models\ProgramStudy;
use Illuminate\Support\Facades\Storage;

class ProgramService{

    // protected $model = new ProgramStudy();
    
    public function storeIconProgram(ProgramRequest $request){
        $image = $request->file('icon');
        $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $path =  'icon/program/' . $imageName;
        $image->storeAs('icon/program/', $imageName, ['disk' => 'public']);
        return $path;
    }
    
    public function storeCoverProgram(ProgramRequest $request){
        $image = $request->file('cover');
        $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $path =  'cover/program/' . $imageName;
        $image->storeAs('cover/program/', $imageName, ['disk' => 'public']);
        return $path;
    }

    public function updateIconProgram(ProgramRequest $request, $id){
        //get data
        $program = ProgramStudy::find($id);

        //delete photo first
        Storage::disk('public')->delete($program->icon);
        
        //upload again
        $image = $request->file('icon');
        $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $path =  'icon/program/' . $imageName;
        $image->storeAs('icon/program/', $imageName, ['disk' => 'public']);
        return $path;
    }

    public function updateCoverProgram(ProgramRequest $request, $id){
        //get data
        $program = ProgramStudy::find($id);

        //delete photo first
        Storage::disk('public')->delete($program->cover);
        
        //upload again
        $image = $request->file('cover');
        $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $path =  'icon/program/' . $imageName;
        $image->storeAs('icon/program/', $imageName, ['disk' => 'public']);
        return $path;
    }
}