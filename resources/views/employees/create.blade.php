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

                    <form method="POST" action="{{ route('employees.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row gutter-y">

                            <div class="col-md-8">
                                <div class="form-group @error('question_en') has-error @enderror">
                                    <label for="question_en"> Firstname <i class="text-danger">*</i></label>
                                    <input class="form-control" id="" name="firstname" value="{{ old('firstname') }}">
                                    @error('firstname')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="form-group @error('question_en') has-error @enderror">
                                    <label for="question_en"> Lastname <i class="text-danger">*</i></label>
                                    <input class="form-control" id="" name="lastname" value="{{ old('lastname') }}">
                                    @error('lastname')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="form-group @error('question_en') has-error @enderror">
                                    <label for="question_en"> Salary <i class="text-danger">*</i></label>
                                    <input class="form-control" id="" type="number" name="salary" value="{{ old('salary') }}">
                                    @error('salary')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="form-group @error('department_id') has-error @enderror">
                                    <label for="department_id"> Assign Department <i class="text-danger">*</i></label>
                                    <select class="form-select" id="department_id" name="department_id">

                                    <option value="">Select Department </option>

                                            @foreach ($departments as $department)
                                                <option value="{{ $department->id }}">{{ $department->title }}</option>
                                            @endforeach

                                    </select>
                                    @error('department_id')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="form-group @error('question_en') has-error @enderror">
                                    <label for="question_en"> Image <i class="text-danger"></i></label>
                                    <input class="form-control" id="" type="file" name="image">{{ old('image') }}</input>
                                    @error('image')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

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
