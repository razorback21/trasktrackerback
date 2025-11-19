<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use App\Services\TaskService;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TaskService $taskService)
    {
        return TaskResource::collection($taskService->paginatedTasks());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request, TaskService $taskService)
    {
        $task = $taskService->createTask($request->input());

        return new TaskResource($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, Task $task, TaskService $taskService)
    {
        $taskService->updateTask($task, $request->input()); //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
    }
}
