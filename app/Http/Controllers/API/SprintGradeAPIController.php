<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\SprintGrade;
use Illuminate\Http\Request;

class SprintGradeAPIController extends Controller
{
    public function grade(Request $request)
    {
        $input = $request->all();

        $gender = "L";

        if ($gender == "L") {
            $sprint = SprintGrade::where('gender', 'L')->pluck('distance');
        } else {
            $sprint = SprintGrade::where('gender', 'P')->pluck('distance');
        }
        $arr = json_decode($sprint);
        function getNearest($arr, $var)
        {
            usort($arr, function ($a, $b) use ($var) {
                return  abs($a - $var) - abs($b - $var);
            });
            return array_shift($arr);
        }
        $result = getNearest($arr, $input['distance']);
        if ($gender == "L") {
            $sprintGrade = SprintGrade::where('gender', 'L')->where('distance', $result)->pluck('score');
            # code...
        } else {
            $sprintGrade = SprintGrade::where('gender', 'P')->where('distance', $result)->pluck('score');
        }
        return \response()->json([
            'message' => "Success get your score",
            'data' => [
                'score' => $sprintGrade[0]
            ]
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $arr = [];
        $sprint = SprintGrade::all();
        // $sprint = SprintGrade::where('gender', $request->input('gender'))->get();

        return \response()->json([
            'message' => 'success',
            'data' => $sprint
        ]);
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
