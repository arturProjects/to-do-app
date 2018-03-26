<?php

namespace App\Modules\Task\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Modules\Task\Repository\TaskRepository;

class TaskController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // all tasks
        $tasks = TaskRepository::indexUserTasks();
        return view("Task::index", compact('tasks'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //generator
        $task = TaskRepository::create();
        return $this->index();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = TaskRepository::show($id);
        return view("Task::show", compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = TaskRepository::edit($id);
        return view("Task::edit", compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $task = [
            'id' => $request->get('id'),
            'alphanumeric' => $request->get('alphanumeric'),
            'description' => $request->get('description'),
            'status' => $request->get('status'),
            
        ];
        TaskRepository::update($task);
        return back();
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TaskRepository::destroy($id);
        return redirect()->route('task.index');
    }
}
