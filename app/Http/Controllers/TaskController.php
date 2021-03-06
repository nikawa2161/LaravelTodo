<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\TaskRequest;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Task::orderByDesc('id')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TaskRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TaskRequest $request)
    {
        $task = Task::create($request->all());

        // createは、成功するとデータを返す
        return $task
        // 上記の$task変数を第一引数に、第二引数には、スタータスコード
            ? response()->json($task, 201)
            : response()->json([], 500);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TaskRequest  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(TaskRequest $request, Task $task)
    {
        $task->title = $request->title;

        // createは、成功するとデータを返す
        return $task->update()
        // 上記の$task変数を第一引数に、第二引数には、スタータスコード
            ? response()->json($task)
            : response()->json([], 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Task $task)
    {
        return $task->delete()
        // 上記の$task変数を第一引数に、第二引数には、スタータスコード
            ? response()->json($task)
            : response()->json([], 500);
    }

    /**
     * is_doneの更新
     *
     * @param Task $task
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function updateDone (Task $task, Request $request)
    {
        $task->is_done = $request->is_done;

        return $task->update()
            ? response()->json($task)
            : response()->json([], 500);
    }
}
