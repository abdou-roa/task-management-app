<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tasks;
use Illuminate\Http\Request;
use App\Models\complitedTask;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ActiveTasksController extends Controller
{
    public function completeTask($id){
        $task = Tasks::find($id);
        $task->is_completed = !$task->is_completed;
        $completed = new complitedTask;
        $completed->id=$task->id;
        $completed->user_id = $task->user_id;
        $completed->task_name = $task->task_name;
        $completed->task_details= $task->task_details;
        $completed->is_completed = ! $task->is_completed;
        $completed->completed_at = Carbon::now();
        $task->delete();
        $completed->save();
        return redirect()->route('home');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //withthis function  i will return all the active tasks an pass them to the home view

        $activeTaks = DB::table('tasks')
                                        ->where('user_id', Auth::id())
                                        ->where('is_completed', false)
                                        ->get();

        $all = false;
        $active = true;
        $completed = false;
        return view('home')
        ->with('activeTasks',$activeTaks)
        ->with('all', $all)
        ->with('active', $active)
        ->with('completed', $completed);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // taking the task name then redirecting to another page when more details about the task are added
        $taskName = $request->TaskName;
        return view('addTask')->with('taskName', $taskName);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // add task name, user_id and task details
        $task = new Tasks;
        $task->user_id = Auth::id();
        $task->task_name = $request->taskName;
        $task->task_details = $request->taskDetails;
        $task->save();
        return redirect()->route('home');
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
