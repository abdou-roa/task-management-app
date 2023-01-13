<?php

namespace App\Http\Controllers;

use auth;
use App\Models\Tasks;
use Illuminate\Http\Request;
use App\Models\complitedTask;
use Illuminate\Support\Facades\DB;

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
        //$activeTasks = complitedTask::all();
        $activeTasks = DB::table('tasks')
                                        ->where('user_id', Auth::id())
                                        ->get();
        //$completedTasks = Tasks::all();
        $completedTasks = DB::table('complited_tasks')
                                                    ->where('user_id', Auth::id())
                                                    ->get();
        $all = true;
        $active = false;
        $completed = false;
        return view('home')
        ->with('complitedTasks',$completedTasks)
        ->with('activeTasks', $activeTasks)
        ->with('all', $all)
        ->with('active', $active)
        ->with('completed', $completed);
    }
}
