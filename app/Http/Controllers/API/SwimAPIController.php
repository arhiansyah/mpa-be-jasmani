<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Swim;
use Illuminate\Http\Request;

class SwimAPIController extends Controller
{
    public function grade(Request $request)
    {
        $input = $request->all();
        $gender = "L";
        function getNearest($arr, $var)
        {
            usort($arr, function ($a, $b) use ($var) {
                return  abs($a - $var) - abs($b - $var);
            });
            return array_shift($arr);
        }
        switch ($gender) {
            case 'L':
                $swim = Swim::where('gender', 'L')->pluck('seconds');
                $arr = json_decode($swim);
                $result = getNearest($arr, $input['seconds']);
                $swimGrade = Swim::where('gender', 'L')->where('seconds', $result)->pluck('score');
                break;
            case 'P':
                $swim = Swim::where('gender', 'P')->pluck('seconds');
                $arr = json_decode($swim);
                $result = getNearest($arr, $input['seconds']);
                $swimGrade = Swim::where('gender', 'P')->where('seconds', $result)->pluck('score');
                break;
        }
        return \response()->json([
            'message' => "Success get your score",
            'data' => [
                'score' => $swimGrade[0]
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
