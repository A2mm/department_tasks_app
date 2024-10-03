@extends('layouts.app')

@section('content')

    @include('layouts.navbars.auth.topnav', ['title' => 'User Management'])

    <div class="row mt-4 mx-4">
        <div class="col-12">

            <div class="card mb-4" style="background-color: #E5E4E2;">
                <div class="card-header pb-0">
                    <p class="text-sm font-weight-bold mb-0 cursor-pointer" style="text-align:right;">
                      <a class="btn btn-success" href="{{ route('employees.create') }}"> Add New </a>
                    </p>

                    <div class="col-md-12">
                        <form action="{{ route('employees.index') }}" method="GET" class="d-flex">
                                <input type="text" name="search" value="{{ old('search') }}" class="form-control" placeholder="Search..." aria-label="Search" style="height:41px;">
                                <button type="submit" class="btn btn-secondary ms-2">
                                    <i class="fas fa-search"></i>
                                </button>
                        </form>
                   </div><br>

                </div>

                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">

                        <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">First Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Last Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Full Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Salary </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Image</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Manager</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Department</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach($employees as $employee)

                                    <tr>
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"> {{ $employee->firstname }} </h6>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"> {{ $employee->lastname }}</h6>
                                                </div>
                                            </div>
                                        </td>


                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"> {{ $employee->firstname }} {{ $employee->lastname }}</h6>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"> {{ $employee->salary }}</h6>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                        <img width="80" height="80" src="{{ $employee->image }}" alt="image" class="img-fluid">
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <p class="text-sm font-weight-bold mb-0"> {{ $employee->manager_name() }} </p>
                                        </td>

                                        <td>
                                            <p class="text-sm font-weight-bold mb-0"> {{ $employee->department->title ?? null}} </p>
                                        </td>

                                        <td class="align-middle text-end">
                                            <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                                <a class="btn btn-xs btn-primary" style="margin-right:5px" href="{{ route('employees.edit', ['employee' => $employee->id]) }}"> Edit </a>
                                                <a class="btn btn-xs btn-danger" href="{{ route('employees.delete', ['employee' => $employee->id]) }}">  Delete </a>
                                            </div>
                                        </td>

                                    </tr>

                                @endforeach
                            </tbody>
                        </table>

                        {{ $employees->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
