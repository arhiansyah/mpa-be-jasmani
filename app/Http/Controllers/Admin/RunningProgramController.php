<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RunningProgramRequest;
use App\Models\Curriculum;
use App\Repositories\RunningProgramRepositoryInterface;
use App\Service\Module\RunningProgramService;
use Illuminate\Http\Request;

class RunningProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $program;
    public function __construct(RunningProgramRepositoryInterface $runproRepo)
    {
        $this->program = $runproRepo;
    }
    
    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $curriculum = Curriculum::get();
        return view('admin.module.running-program.create', compact('curriculum'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RunningProgramRequest $request)
    {
        
        $input = $request->validated();
        $uploadImage = new RunningProgramService();

        //upload icon
        if($request->hasFile('icon')){
            $input['icon'] = $uploadImage->storeIconRunningProgram($request);
        }

        //upload cover
        if($request->hasFile('cover')){
            $input['cover'] = $uploadImage->storeCoverRunningProgram($request);
        }
        
        //formating price
        $input['price'] = (int) str_replace('.','',$request->price);
        //directing program study
        $input['program_study_id'] = $request['program_study_id'];

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
        $runpro = $this->program->getById($id);
        return view('admin.module.running-program.show', compact('runpro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $runpro = $this->program->getById($id);
        $curriculum = Curriculum::get();
        $data = [
            'runpro' => $runpro,
            'curriculum' => $curriculum
        ];
        return view('admin.module.running-program.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RunningProgramRequest $request, $id)
    {
        $input = $request->validated();
        $uploadImage = new RunningProgramService();

        //upload icon
        if($request->hasFile('icon')){
            $input['icon'] = $uploadImage->updateIconRunningProgram($request, $id);
        }

        //upload cover
        if($request->hasFile('cover')){
            $input['cover'] = $uploadImage->updateCoverRunningProgram($request, $id);
        }
        $input['price'] = (int) str_replace('.','',$request->price);
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
        $this->program->delete($id);
        return redirect()->route('program.index');
    }
}
