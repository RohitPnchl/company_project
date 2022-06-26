@extends('layouts.main')

@section('title', 'Assign Department')

@section('content')
<div class="container-fluid">
    <div class="header">
        <div class="row">
            <div class="col-md-6">
                <h1 class="header-title">
                    Assign Department
                </h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.assign-department.index') }}">Assigned Departments</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Assign Department</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6">
                <div class="pull-right mt-4">
                    <a href="{{ route('admin.assign-department.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left fa-sm"></i> Back</a>
                </div>
            </div>
        </div>
        @if(session('success'))
        <div class="alert alert-success">
            <span class="my-3 mx-2">{{ session('success') }}</span>
        </div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger">
            <span class="my-3 mx-2">{{ session('error') }}</span>
        </div>
        @endif
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <form class="" action="{{ route('admin.assign-department.store') }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="mb-3">
                            <label class="form-label">Incharge</label>
                            <select class="form-control" name="incharge">
                                <option value="" selected disabled>Select Incharge</option>
                                @foreach ($incharges as $incharge)
                                    <option value="{{ $incharge->id }}">{{ $incharge->name }}</option>
                                @endforeach
                            </select>
                            @error('incharge')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Department</label>
                            <select class="form-control" name="department">
                                <option value="" selected disabled>Select Department</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                            @error('department')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Assign</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
