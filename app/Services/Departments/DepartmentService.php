<?php

namespace App\Services\Departments;

use Illuminate\Http\Request;
use App\Models\Departments\Department;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;

class DepartmentService
{
    public function index(array $filters)
    {
        $search = $filters['search'] ?? null;

        $departments = Department::withCount('employees')
            ->withSum('employees', 'salary')
            ->when($search, function (Builder $query, $value) {
                return $query->where('title', 'LIKE', '%' . $value . '%');
            })
            ->paginate(paginationSize());

        return $departments;
    }

    public function show(Department $department): Department
    {
        return $department;
    }

    public function store(array $data): Department
    {
        return Department::create($data);
    }

    public function update(array $data, Department $department): bool
    {
        return $department->update($data);
    }

    public function delete(Department $department): bool
    {
        return $department->delete();
    }
}
