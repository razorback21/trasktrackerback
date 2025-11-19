<?php

namespace App\Services;

use App\Models\Task;
use Illuminate\Support\Facades\Log;

class TaskService
{
    public function paginatedTasks($perPage = 10)
    {
        $tasks = Task::query()->with('user');
        // filter by due_date if provided
        if (request()->has('due_date')) {
            $tasks->whereDate('due_date', request()->input('due_date'));
        }
        // filter by status if provided
        if (request()->has('status')) {
            $tasks->where('status', request()->input('status'));
        }

        return $tasks->paginate($perPage)->withQueryString();
    }

    public function createTask(array $data)
    {
        try {
            return Task::create($data);
        } catch (\Exception $e) {
            // Handle exception or log error
            Log::info('Task creation failed: '.$e->getMessage());
        }
    }

    public function updateTask(Task $task, array $data)
    {
        try {
            $task->update($data);

            return $task;
        } catch (\Exception $e) {
            Log::info('Task update failed: '.$e->getMessage());
        }
    }
}
