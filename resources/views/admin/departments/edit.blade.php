@extends('layouts.main')

@section('title', 'Edit Department')

@section('content')
<div class="container-fluid">
    <div class="header">
        <div class="row">
            <div class="col-md-6">
                <h1 class="header-title">
                    Edit Department
                </h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.departments.index') }}">Departments</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Department</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6">
                <div class="pull-right mt-4">
                    <a href="{{ route('admin.departments.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left fa-sm"></i> Back</a>
                </div>
            </div>
        </div>
        @if(session('success'))
        <div class="alert alert-success">
            <span class="my-3 mx-2">{{ session('success') }}</span>
        </div>
        @endif
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <form class="" action="{{ route('admin.departments.update', $department->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Department Name" value="{{ old('name', $department->name) }}" />
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
