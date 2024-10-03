<?php

namespace App\Services\Tasks;

use App\Traits\HasUser;
use App\Models\Tasks\Task;
use Illuminate\Http\Request;
use App\Enums\Employees\EmployeeRoleEnum;
use Illuminate\Database\Eloquent\Collection;

class TaskService
{
    use HasUser;

    public function index(array $filters)
    {
        $data = $this->checkAuthRole();
        return $data->paginate(paginationSize());
    }

    public function store(array $data): Task
    {
        return Task::create($data);
    }

    public function update(array $data, Task $task): bool
    {
        return $task->update($data);
    }

    public function delete(Task $task): bool
    {
        return $task->delete();
    }

    private function checkAuthRole()
    {
        return $this->user()->role == EmployeeRoleEnum::MANAGER ? Task::with('employee') : $this->user()->tasks();
    }

}
