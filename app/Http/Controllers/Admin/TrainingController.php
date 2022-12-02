<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TrainingRequest;
use App\Models\Exercise;
use App\Models\Training;
use App\Repositories\TrainingRepositoryInterface;
use App\Service\Module\TrainingService;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $training;


    public function __construct(TrainingRepositoryInterface $trainingRepo)
    {
        $this->training = $trainingRepo;
    }

    public function index()
    {
        $training = $this->training->getAll();
        return view('admin.module.training.index', compact('training'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $exercise = Exercise::get();
        return view('admin.module.training.create', compact('exercise'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TrainingRequest $request)
    {
        // dd($request->all());
        $input = $request->validated();
        $uploadImage = new TrainingService();

        //upload video
        if ($request->hasFile('video')) {
            $input['video'] = $uploadImage->storeVideoTraining($request);
        }

        //create
        $training = $this->training->create($input);
        $this->training->attachExercise($training->id, $request['exercise']);
        return redirect()->route('training.index')->with('success', __('general.add_data_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $training = $this->training->getById($id);
        return view('admin.module.training.show', compact('training'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exercise = Exercise::get();
        $training = $this->training->getById($id);
        $data = [
            'exercise' => $exercise,
            'training' => $training
        ];
        // dd($training->exercise[5]->name);
        return view('admin.module.training.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TrainingRequest $request, $id)
    {
        // dd($request->hasFile('icon'));
        $input = $request->validated();
        $uploadImage = new TrainingService();

        //upload icon
        if ($request->hasFile('video_intro')) {
            $input['video_intro'] = $uploadImage->updateVideoTraining($request, $id);
        }

        //create
        $training = $this->training->edit($id, $input);
        $this->training->syncExercise($training->id, $request['exercise']);
        return redirect()->route('training.index')->with('success', __('general.add_data_success'));
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
            $training = Training::find($id);
            $this->training->delete($id);
            Storage::disk('public')->delete($training->video_intro);
        } catch (QueryException $e) {
            //throw $th;
            dd($e);
        }
        return redirect()->route('training.index');
    }
}
