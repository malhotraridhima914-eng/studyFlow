<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\addTask;
use App\Models\addSub;

class addTaskController extends Controller
{
    public function showform()
    {
        
        $subjects = addSub::all();

    return view('task', compact('subjects'));
    }

    public function add(Request $request)
    {
        addTask::create([
            "task_name" => $request->task_name,
            "subject"=>$request->subject,
            "date" => $request->date,
            "level"=>$request->level,
        ]);

        return redirect("/");
    }
    public function complete($id)
{
    $task = addTask::findOrFail($id);

    $task->completed = !$task->completed;

    $task->save();

    return redirect('/');
}
public function manage()
    {
        $tasks = addTask::all();
    
        return view('manageTasks', compact('tasks'));
    }
public function edit($id)
    {
        $task = addTask::findOrFail($id);
    
        return view('editTask', compact('task'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'task_name'=>'required'
        ]);
        $task=addTask::findOrFail($id);
        $task->task_name=$request->task_name;
        $task->save();
        return redirect('/ManageTasks')
        ->with('success','Task updated Successfully!');
    }
    public function delete($id){
        $task=addTask::findOrFail($id);
        $task->delete();

        return redirect('/ManageTasks')
        ->with('success','Task has been deleted!');
    }
}

