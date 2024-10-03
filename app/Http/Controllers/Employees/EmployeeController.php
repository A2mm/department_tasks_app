<?php

namespace App\Http\Controllers\Employees;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Lookups\LookupsService;
use App\Services\Employees\EmployeeService;
use App\Http\Requests\Employees\AddEmployeeRequest;
use App\Http\Requests\Employees\UpdateEmployeeRequest;

class EmployeeController extends Controller
{

    private EmployeeService $employeeService;
    private LookupsService $lookupsService;

    public function __construct(EmployeeService $employeeService, LookupsService $lookupsService)
    {
        $this->employeeService = $employeeService;
        $this->lookupsService = $lookupsService;
    }

    public function index(Request $request)
    {
        $employees = $this->employeeService->index($request->all());
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $departments = $this->lookupsService->fetchDepartments();
        return view('employees.create', ['departments' => $departments]);
    }

    public function store(AddEmployeeRequest $request)
    {
        try {
            $this->employeeService->store($request->validated());
            return redirect()->route('employees.index')->with('message', 'Data saved successfully!');
        } catch (Exception $exception) {
            throw new $exception;
        }
    }

    public function edit(User $employee)
    {
        $departments = $this->lookupsService->fetchDepartments();
        return view('employees.edit', ['employee' => $employee, 'departments' => $departments]);
    }

    public function update(UpdateEmployeeRequest $request, User $employee)
    {
        try {
            $this->employeeService->update($request->validated(), $employee);
            return redirect()->route('employees.index')->with('message', 'Data saved successfully!');
        } catch (Exception $exception) {
            throw new $exception;
        }
    }

    public function delete(User $employee)
    {
        try {
            if($department->employees->count()){
                return redirect()->back()->with('error', 'Can not delete department with employees assigned to!');
            }
            $this->employeeService->delete($employee);
            return redirect()->route('employees.index')->with('message', 'Employee Deleted successfully!');
        } catch (Exception $exception) {
            throw new $exception;
        }
    }
}
