@extends('layouts.app')

@section('content')

    @include('layouts.navbars.auth.topnav', ['title' => 'Task Management'])

    <div class="row mt-4 mx-4">
        <div class="col-12">

            <div class="card mb-4" style="background-color: #E5E4E2;">

            @if(auth()->user()->role == 'manager')
                <div class="card-header pb-0">
                        <p class="text-sm font-weight-bold mb-0 cursor-pointer" style="text-align:right;">
                        <a class="btn btn-success" href="{{ route('tasks.create') }}"> Add New </a>
                        </p>
                </div>
            @endif

                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">

                        <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Description</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Employee</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> Create Date</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach($tasks as $task)

                                    <tr>
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"> {{ $task->title }}</h6>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ $task->description }} </p>
                                        </td>

                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ $task->status }} </p>
                                        </td>

                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ $task->employee->full_name }} </p>
                                        </td>

                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm font-weight-bold mb-0"> {{ $task->created_at }}  </p>
                                        </td>

                                        <td class="align-middle text-end">
                                            <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                                <a class="btn btn-xs btn-primary" style="margin-right:5px" href="{{ route('tasks.edit', ['task' => $task->id]) }}"> Edit </a>
                                                @if(auth()->user()->role == 'manager')
                                                <a class="btn btn-xs btn-danger" href="{{ route('tasks.delete', ['task' => $task->id]) }}">  Delete </a>
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
