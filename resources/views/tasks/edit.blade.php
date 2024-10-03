@extends('layouts.app')

@section('content')

    @include('layouts.navbars.auth.topnav', ['title' => 'User Management'])

    <div class="row mt-4 mx-4">
        <div class="col-12">

            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Users</h6>
                </div>

                    <div style="margin-left : 15px;">

                    <form method="POST" action="{{ route('tasks.update', ['task' => $task]) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row gutter-y">

                            <div class="col-md-8">
                                <div class="form-group @error('title') has-error @enderror">
                                    <label for="title"> Title <i class="text-danger">*</i></label>
                                    <input class="form-control" id="" name="title" value="{{ $task->title }}">
                                    @error('title')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="form-group @error('description') has-error @enderror">
                                    <label for="description"> Description <i class="text-danger">*</i></label>
                                    <input class="form-control" id="" name="description" value="{{ $task->description }}">
                                    @error('description')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="form-group @error('status') has-error @enderror">
                                    <label for="status"> Select Status <i class="text-danger">*</i></label>
                                    <select class="form-select" id="status" name="status">
                                            @foreach ($statuses as $status)
                                                <option value="{{ $status }}" {{ $task->status == $status ? 'selected' : ''}}>{{ $status }}</option>
                                            @endforeach
                                    </select>
                                    @error('status')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            @if(auth()->user()->role == 'manager')
                            <div class="col-md-8">
                                <div class="form-group @error('user_id') has-error @enderror">
                                    <label for="user_id"> Assign Employee <i class="text-danger">*</i></label>
                                    <select class="form-select" id="user_id" name="user_id">
                                            @foreach ($employees as $employee)
                                                <option value="{{ $employee->id }}" {{ $task->user_id == $employee->id ? 'selected' : ''}}>{{ $employee->full_name }}</option>
                                            @endforeach
                                    </select>
                                    @error('user_id')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            @endif

                            <div class="col-md-12">
                                <div class="form-group">
                                    <button class="btn btn-success">{{ 'Save' }} </button>
                                </div>
                            </div>
                            </div>


                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
