<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExerciseSessionRequest;
use App\Models\ExerciseSession;
use App\Models\GroupTraining;
use App\Repositories\ExerciseSessionRepositoryInterface;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ExerciseSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $exerciseSession;


    public function __construct(ExerciseSessionRepositoryInterface $exerciseSessionRepo)
    {
        $this->exerciseSession = $exerciseSessionRepo;
    }

    public function index()
    {
        $exerciseSession = $this->exerciseSession->getAll();
        return view('admin.module.exercise-session.index', compact('exerciseSession'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groupTraining = GroupTraining::get();
        return view('admin.module.exercise-session.create', compact('groupTraining'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExerciseSessionRequest $request)
    {
        $input = $request->validated();

        //create
        $exerciseSession = $this->exerciseSession->create($input);
        $this->exerciseSession->attachGroupTraining($exerciseSession->id, $request['groupTraining']);
        return redirect()->route('exercise-session.index')->with('success', __('general.add_data_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exerciseSession = $this->exerciseSession->getById($id);
        return view('admin.module.exercise-session.show', compact('exerciseSession'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $groupTraining = GroupTraining::get();
        $exerciseSession = $this->exerciseSession->getById($id);
        $data = [
            'groupTraining' => $groupTraining,
            'exerciseSession' => $exerciseSession,
        ];
        // dd($training->exercise[5]->name);
        return view('admin.module.exercise-session.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExerciseSessionRequest $request, $id)
    {
        // dd($request->hasFile('icon'));
        $input = $request->validated();

        //create
        $exerciseSession = $this->exerciseSession->edit($id, $input);
        $this->exerciseSession->syncGroupTraining($exerciseSession->id, $request['groupTraining']);
        return redirect()->route('exercise-session.index')->with('success', __('general.add_data_success'));
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
            $exerciseSession = ExerciseSession::find($id);
            $this->exerciseSession->delete($id);
        } catch (QueryException $e) {
            //throw $th;
            dd($e);
        }
        return redirect()->route('exercise-session.index');
    }
}
