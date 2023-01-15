<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;
use App\Models\complitedTask;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ComplitedTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $completedTasks = DB::table('complited_tasks')
                                                    ->where('user_id', Auth::id())
                                                    ->get();

        $all = false;
        $active = false;
        $completed = true;
        return view('home')
        ->with('completedTasks',$completedTasks)
        ->with('all', $all)
        ->with('active', $active)
        ->with('completed', $completed);
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
        $endedTask = complitedTask::find($id);
        $endedTask->delete();
        return redirect()->route('completedTasks');
    }
    public function uncheckTask($id){
        $completedTask = complitedTask::find($id);
        $recovredTask = new Tasks;
        $recovredTask->id = $completedTask->id;
        $recovredTask->user_id = Auth::id();
        $recovredTask->task_name = $completedTask->task_name;
        $recovredTask->task_details = $completedTask->task_details;
        $recovredTask->is_completed = false;
        $recovredTask->save();
        $completedTask->delete();
        return redirect()->route('home');
    }
}
