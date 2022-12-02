<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Workout;
use Illuminate\Http\Request;

class WorkoutAPIController extends Controller
{
    public function grade(Request $request)
    {
        function getNearest($arr, $var)
        {
            usort($arr, function ($a, $b) use ($var) {
                return  abs($a - $var) - abs($b - $var);
            });
            return array_shift($arr);
        }
        $input = $request->all();
        $gender = "L";
        $type = "";

        if ($gender == "L") {
            switch ($type) {
                case 'pull-up':
                    $workout = Workout::where('gender', 'L')->where('type', 'pull-up')->pluck('motion');
                    $arr = json_decode($workout);
                    $result = getNearest($arr, $input['motion']);
                    $workoutGrade = Workout::where('gender', 'L')->where('type', 'pull-up')->where('motion', $result)->pluck('score');
                    break;
                case 'push-up':
                    $workout = Workout::where('gender', 'L')->where('type', 'push-up')->pluck('motion');
                    $arr = json_decode($workout);
                    $result = getNearest($arr, $input['motion']);
                    $workoutGrade = Workout::where('gender', 'L')->where('type', 'push-up')->where('motion', $result)->pluck('score');
                    break;
            }
        } else {
            switch ($type) {
                case 'chinning':
                    $workout = Workout::where('gender', 'P')->where('type', 'chinning')->pluck('motion');
                    $arr = json_decode($workout);
                    $result = getNearest($arr, $input['motion']);
                    $workoutGrade = Workout::where('gender', 'P')->where('type', 'chinning')->where('motion', $result)->pluck('score');
                    break;
                case 'push-up':
                    $workout = Workout::where('gender', 'P')->where('type', 'push-up')->pluck('motion');
                    $arr = json_decode($workout);
                    $result = getNearest($arr, $input['motion']);
                    $workoutGrade = Workout::where('gender', 'P')->where('type', 'push-up')->where('motion', $result)->pluck('score');
                    break;
            }
        }
        return \response()->json([
            'message' => "Success get your score",
            'data' => [
                'score' => $workoutGrade[0]
            ]
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
