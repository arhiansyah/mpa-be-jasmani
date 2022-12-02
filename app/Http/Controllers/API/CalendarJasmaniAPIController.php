<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CalendarJasmani;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CalendarJasmaniAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = [];
        $calendar = CalendarJasmani::all();
        array_push($result, $calendar);
        return response()->json([
            'message' => "Success Get data calendar jasmani",
            'data' => $result
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $calendar = CalendarJasmani::create($input);

        return response()->json([
            'message' => "Success create calendar jasmani",
            'data' => $calendar
        ]);
    }

    public function showTitle($title)
    {
        $result = [];
        $calendar = CalendarJasmani::where('title', $title)->first();
        // dd($calendar);
        $calendar->start = Carbon::parse($calendar->start)->isoFormat('YYYY-MM-DD');
        $calendar->end = Carbon::parse($calendar->end)->isoFormat('YYYY-MM-DD');

        // dd($calendar);
        array_push($result, $calendar);
        return \response()->json([
            'message' => "Success Get Detail data calendar",
            'data' => $result
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
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
        $calendar = CalendarJasmani::find($id)->update($request->all());
        return response()->json([
            'message' => "Success updated events"
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $calendar = CalendarJasmani::find($id)->delete();

        return \response()->json([
            'message' => "Success deleted events"
        ], 200);
    }
}
