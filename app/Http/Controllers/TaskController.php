<?php

namespace App\Http\Controllers;
use App\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $tasks = Task::latest()->get();
      return view('tasks.index', [
          'tasks' => $tasks
      ]);
  }
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(TaskRequest $request)
  {
      // $validator = Validator::make($request->all(), [
      //     'task_name' => 'required|max:255',
      // ]);
      // if ($validator->fails()) {
      //     return redirect('/')
      //         ->withInput()
      //         ->withErrors($validator);
      // }
      $task = new Task;
      $task->name = $request->task_name;
      $task->save();
      return redirect('/');
  }
  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Task  $task
   * @return \Illuminate\Http\Response
   */
  public function destroy(Task $task)
  {
      $task->delete();
      return redirect('/');
  }
}
