<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExerciseRequest;
use App\Models\Exercise;
use App\Repositories\ExerciseRepositoryInterface;
use App\Service\Module\ExerciseService as ModuleExerciseService;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $exercise;


    public function __construct(ExerciseRepositoryInterface $exerciseRepo)
    {
        $this->exercise = $exerciseRepo;
    }
    public function index()
    {

        $exercise = $this->exercise->getAll();
        return view('admin.module.exercise.index', compact('exercise'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.module.exercise.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExerciseRequest $request)
    {
        $input = $request->validated();
        $uploadImage = new ModuleExerciseService();

        //upload video
        if ($request->hasFile('video')) {
            $input['video'] = $uploadImage->storeVideoExercise($request);
        }
        //upload icon
        if ($request->hasFile('icon')) {
            $input['icon'] = $uploadImage->storeIconExercise($request);
        }

        //upload cover
        if ($request->hasFile('cover')) {
            $input['cover'] = $uploadImage->storeCoverExercise($request);
        }

        //upload animation
        if ($request->hasFile('animation')) {
            $input['animation'] = $uploadImage->storeAnimationExercise($request);
        }
        // dd($input);
        //create
        $exercise = $this->exercise->create($input);

        return redirect()->route('exercise.index')->with('success', __('general.add_data_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exercise = $this->exercise->getById($id);
        return view('admin.module.exercise.show', compact('exercise'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $exercise = $this->exercise->getById($id);
        return view('admin.module.exercise.edit', compact('exercise'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExerciseRequest $request, $id)
    {
        // dd($request->hasFile('icon'));
        $input = $request->validated();
        $uploadImage = new ModuleExerciseService();

        //upload icon
        if ($request->hasFile('icon')) {
            $input['icon'] = $uploadImage->updateIconExercise($request, $id);
        }

        //upload cover
        if ($request->hasFile('cover')) {
            $input['cover'] = $uploadImage->updateCoverExercise($request, $id);
        }

        //create
        $exercise = $this->exercise->edit($id, $input);

        return redirect()->route('exercise.index')->with('success', __('general.add_data_success'));
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
            $exercise = Exercise::find($id);
            $this->exercise->delete($id);
            Storage::disk('public')->delete($exercise->video);
            Storage::disk('public')->delete($exercise->icon);
            Storage::disk('public')->delete($exercise->cover);
            Storage::disk('public')->delete($exercise->animation);
        } catch (QueryException $e) {
            //throw $th;
            dd($e);
        }
        return redirect()->route('exercise.index');
    }
}
