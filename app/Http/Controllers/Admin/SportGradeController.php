<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SprintRequest;
use App\Models\SprintGrade;
use App\Models\SprintGradeMen;
use App\Models\SprintGradeWomen;
use App\Models\Swim;
use App\Models\Workout;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class SportGradeController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->all());

        $sprint = SprintGrade::all(['distance', 'score', 'gender']);
        $workout = Workout::all();
        $swim = Swim::all();
        $sprColumn = ['Distance', 'Score', 'Gender'];
        $workColumn = ['Motion', 'Score', 'Gender', 'Type'];
        $swimColumn = ['Duration', 'Score', 'Gender'];
        $data = [
            'sprint' => $sprint,
            'workout' => $workout,
            'swim' => $swim,
            'sprColumn' => $sprColumn,
            'workColumn' => $workColumn,
            'swimColumn' => $swimColumn
        ];

        return view('admin.module.sport.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.module.sport.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SprintRequest $request)
    {
        $input = $request->validated();

        //create
        $sprintMen = SprintGrade::create($input);

        return redirect()->route('sports.index')->with('success', __('general.add_data_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sprintMen = SprintGrade::find($id);
        return view('admin.module.sport.show', compact('sprintMen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sprintMen = SprintGrade::find($id);
        return view('admin.module.sport.edit', compact('sprintMen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SprintRequest $request, $id)
    {
        // dd($request->hasFile('icon'));
        $input = $request->validated();

        //create
        $sprintGrade = SprintGrade::find($id)->update($input);

        return redirect()->route('sports.index')->with('success', __('general.add_data_success'));
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
            $sprintMen = SprintGrade::find($id)->delete();
        } catch (QueryException $e) {
            //throw $th;
            dd($e);
        }
        return redirect()->route('sports.index');
    }
}
