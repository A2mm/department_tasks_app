<?php

namespace App\Http\Controllers\Tasks;

use Exception;
use App\Models\Tasks\Task;
use Illuminate\Http\Request;
use App\Enums\Tasks\TaskStatusEnum;
use App\Services\Tasks\TaskService;
use App\Http\Controllers\Controller;
use App\Services\Lookups\LookupsService;
use App\Http\Requests\Tasks\AddTaskRequest;
use App\Http\Requests\Tasks\UpdateTaskRequest;

class TaskController extends Controller
{
    private TaskService $taskService;
    private LookupsService $lookupsService;

    public function __construct(TaskService $taskService, LookupsService $lookupsService)
    {
        $this->taskService = $taskService;
        $this->lookupsService = $lookupsService;
    }

    public function index(Request $request)
    {
        $tasks = $this->taskService->index($request->all());
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $statuses = TaskStatusEnum::statusNames();
        $employees = $this->lookupsService->fetchMyEmployees();
        return view('tasks.create', ['employees' => $employees, 'statuses' => $statuses]);
    }

    public function store(AddTaskRequest $request)
    {
        try {
            $this->taskService->store($request->validated());
            return redirect()->route('tasks.index')->with('message', 'Data saved successfully!');
        } catch (Exception $exception) {
            throw new $exception;
        }
    }

    public function edit(Task $task)
    {
        $statuses = TaskStatusEnum::statusNames();
        $employees = $this->lookupsService->fetchMyEmployees();
        return view('tasks.edit', ['task' => $task, 'employees' => $employees, 'statuses' => $statuses]);
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        try {
            $this->taskService->update($request->validated(), $task);
            return redirect()->route('tasks.index')->with('message', 'Data saved successfully!');
        } catch (Exception $exception) {
            throw new $exception;
        }
    }

    public function delete(Task $task)
    {
        try {
            $this->taskService->delete($task);
            return redirect()->route('tasks.index')->with('message', 'Task deleted successfully!');
        } catch (Exception $exception) {
            throw new $exception;
        }
    }
}
