@extends('layouts.app')

@section('content')

    @include('layouts.navbars.auth.topnav', ['title' => 'Department Management'])

    <div class="row mt-4 mx-4">
        <div class="col-12">

            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Users</h6>
                </div>

                    <div style="margin-left : 15px;">

                    <form method="POST" action="{{ route('departments.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row gutter-y">

                            <div class="col-md-8">
                                <div class="form-group @error('title') has-error @enderror">
                                    <label for="title"> Title <i class="text-danger">*</i></label>
                                    <input class="form-control" id="" name="title" value="{{ old('title') }}">
                                    @error('title')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="form-group @error('description') has-error @enderror">
                                    <label for="description"> Description <i class="text-danger">*</i></label>
                                    <input class="form-control" id="" name="description" value="{{ old('description') }}">
                                    @error('description')
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
