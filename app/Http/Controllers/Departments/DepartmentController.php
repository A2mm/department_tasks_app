<?php

namespace App\Http\Controllers\Departments;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Departments\Department;
use App\Services\Departments\DepartmentService;
use App\Http\Requests\Departments\AddDepartmentRequest;
use App\Http\Requests\Departments\UpdateDepartmentRequest;

class DepartmentController extends Controller
{
    private DepartmentService $departmentService;

    public function __construct(DepartmentService $departmentService)
    {
        $this->departmentService = $departmentService;
    }

    public function index(Request $request)
    {
        $departments = $this->departmentService->index($request->all());
        return view('departments.index', compact('departments'));
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(AddDepartmentRequest $request)
    {
        try {
            $this->departmentService->store($request->validated());
            return redirect()->route('departments.index')->with('message', 'Data saved successfully!');
        } catch (Exception $exception) {
            throw new $exception;
        }
    }

    public function edit(Department $department)
    {
        return view('departments.edit', ['department' => $department]);
    }

    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        try {
            $this->departmentService->update($request->validated(), $department);
            return redirect()->route('departments.index')->with('message', 'Data saved successfully!');
        } catch (Exception $exception) {
            throw new $exception;
        }
    }

    public function delete(Department $department)
    {
        try {
            $this->departmentService->delete($department);
            return redirect()->route('departments.index')->with('message', 'Department saved successfully!');
        } catch (Exception $exception) {
            throw new $exception;
        }
    }
}
