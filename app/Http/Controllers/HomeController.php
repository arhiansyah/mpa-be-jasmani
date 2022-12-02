<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\GroupTraining;
use App\Models\Training;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $exercise = Exercise::all();
        $training = Training::all();
        $groupTraining = GroupTraining::all();
        $data = [
            'exercise' => $exercise,
            'training' => $training,
            'grouptraining' => $groupTraining
        ];
        // dd($data);
        return view('admin.dashboard', $data);
    }
}
