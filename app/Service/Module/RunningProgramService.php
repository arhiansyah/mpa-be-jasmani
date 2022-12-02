<?php 
    
namespace App\Service\Module;

use App\Http\Requests\RunningProgramRequest;
use App\Models\RunningProgram;
use Illuminate\Support\Facades\Storage;

class RunningProgramService{

    public function storeIconRunningProgram(RunningProgramRequest $request){
        $image = $request->file('icon');
        $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $path =  'icon/running-program/' . $imageName;
        $image->storeAs('icon/running-program/', $imageName, ['disk' => 'public']);
        return $path;
    }
    
    public function storeCoverRunningProgram(RunningProgramRequest $request){
        $image = $request->file('cover');
        $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $path =  'cover/running-program/' . $imageName;
        $image->storeAs('cover/running-program/', $imageName, ['disk' => 'public']);
        return $path;
    }

    public function updateIconRunningProgram(RunningProgramRequest $request, $id){
        //get data
        $program = RunningProgram::find($id);

        //delete photo first
        Storage::disk('public')->delete($program->icon);
        
        //upload again
        $image = $request->file('icon');
        $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $path =  'icon/running-program/' . $imageName;
        $image->storeAs('icon/running-program/', $imageName, ['disk' => 'public']);
        return $path;
    }

    public function updateCoverRunningProgram(RunningProgramRequest $request, $id){
        //get data
        $program = RunningProgram::find($id);

        //delete photo first
        Storage::disk('public')->delete($program->cover);
        
        //upload again
        $image = $request->file('cover');
        $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $path =  'icon/running-program/' . $imageName;
        $image->storeAs('icon/running-program/', $imageName, ['disk' => 'public']);
        return $path;
    }
}