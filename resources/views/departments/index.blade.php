@extends('layouts.app')

@section('content')

    @include('layouts.navbars.auth.topnav', ['title' => 'Department Management'])

    <div class="row mt-4 mx-4">
        <div class="col-12">

            <div class="card mb-4" style="background-color: #E5E4E2;">
                <div class="card-header pb-0">
                    <p class="text-sm font-weight-bold mb-0 cursor-pointer" style="text-align:right;">
                      <a class="btn btn-success" href="{{ route('departments.create') }}"> Add New </a>
                    </p>

                    <div class="col-md-12">
                        <form action="{{ route('departments.index') }}" method="GET" class="d-flex">
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
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Description</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Employee Count</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Salary Sum</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> Create Date</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach($departments as $department)

                                    <tr>
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"> {{ $department->title }} </h6>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ $department->description }} </p>
                                        </td>

                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ $department->employees_count }} </p>
                                        </td>

                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ number_format($department->employees_sum_salary, 2) }} </p>
                                        </td>

                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm font-weight-bold mb-0"> {{ $department->created_at }}  </p>
                                        </td>

                                        <td class="align-middle text-end">
                                            <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                                <a class="btn btn-xs btn-primary" style="margin-right:5px" href="{{ route('departments.edit', ['department' => $department->id]) }}"> Edit </a>

                                                @if(!$department->employees->count())
                                                <a class="btn btn-xs btn-danger" href="{{ route('departments.delete', ['department' => $department->id]) }}">  Delete </a>
                                                @endif
                                            </div>
                                        </td>

                                    </tr>

                                @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
