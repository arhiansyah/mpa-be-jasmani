<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProgramRequest;
use App\Models\ProgramStudy;
use App\Repositories\ProgramRepositoryInterface;
use App\Service\Module\ProgramService;
use App\Service\UploadImageService;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $program;
    

    public function __construct(ProgramRepositoryInterface $programRepo)
    {
        $this->program = $programRepo;

    }
    public function index()
    {
        
        $program = $this->program->getAll();
        return view('admin.module.program.index', compact('program'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.module.program.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProgramRequest $request)
    {
        // dd($request->hasFile('icon'));
        $input = $request->validated();
        $uploadImage = new ProgramService();

        //upload icon
        if($request->hasFile('icon')){
            $input['icon'] = $uploadImage->storeIconProgram($request);
        }

        //upload cover
        if($request->hasFile('cover')){
            $input['cover'] = $uploadImage->storeCoverProgram($request);
        }

        //create
        $program = $this->program->create($input);

        return redirect()->route('program.index')->with('success', __('general.add_data_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $program = $this->program->getById($id);
        return view('admin.module.program.show', compact('program'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $program = $this->program->getById($id);
        return view('admin.module.program.edit', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProgramRequest $request, $id)
    {
        // dd($request->hasFile('icon'));
        $input = $request->validated();
        $uploadImage = new ProgramService();

        //upload icon
        if($request->hasFile('icon')){
            $input['icon'] = $uploadImage->updateIconProgram($request, $id);
        }

        //upload cover
        if($request->hasFile('cover')){
            $input['cover'] = $uploadImage->updateCoverProgram($request, $id);
        }

        //create
        $program = $this->program->edit($id, $input);

        return redirect()->route('program.index')->with('success', __('general.add_data_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            //code...
            $this->program->delete($id);
        } catch (QueryException $e) {
            //throw $th;
            dd($e);
        }
        return redirect()->route('program.index');
    }
}
