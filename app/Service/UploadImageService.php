<?php 
    
namespace App\Service;

use App\Http\Requests\ProgramRequest;
use Illuminate\Support\Facades\Storage;

class UploadImageService{

    public function iconProgram(ProgramRequest $request){
        $image = $request->file('icon');
        $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $path =  'icon/program/' . $imageName;
        $image->storeAs('icon/program/', $imageName, ['disk' => 'public']);
        return $path;
    }
    
    public function coverProgram(ProgramRequest $request){
        $image = $request->file('cover');
        $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $path =  'cover/program/' . $imageName;
        $image->storeAs('cover/program/', $imageName, ['disk' => 'public']);
        return $path;
    }


}