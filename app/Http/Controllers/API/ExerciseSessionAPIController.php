<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ExerciseSession;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ExerciseSessionAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exerciseSession = ExerciseSession::orderBy('created_at', 'desc')->get();

        return response()->json([
            'message' => 'Success get exercise session',
            'data' => $exerciseSession
        ], 200);
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
    public function show(ExerciseSession $exercise_session)
    {
        try {
            return response()->json([
                'message' => "success get detail data exercise session",
                'data' => [
                    'exerciseSession' => $exercise_session,
                    'groupTraining' => $exercise_session->GroupTraining
                ]
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'message' => "Failed" . $e->errorInfo[2]
            ]);
        }
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
