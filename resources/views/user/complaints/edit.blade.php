@extends('layouts.main')

@section('title', 'Edit Complaint')

@section('content')
<div class="container-fluid">
    <div class="header">
        <div class="row">
            <div class="col-md-6">
                <h1 class="header-title">
                    Edit Complaint
                </h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('user.complaints.index') }}">Complaints</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Complaint</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6">
                <div class="pull-right mt-4">
                    <a href="{{ route('user.complaints.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left fa-sm"></i> Back</a>
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
                    <form class="" action="{{ route('user.complaints.update', $complaint->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="department_id" value="{{ $complaint->department_id }}">
                        <div class="mb-3">
                            <label class="form-label">Department</label>
                            <select class="form-control" name="department" disabled>
                                <option value="" selected disabled>Select Department</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}" {{ $complaint->department_id == $department->id ? 'selected' : '' }}>{{ $department->name }}</option>
                                @endforeach
                            </select>
                            @error('department')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Complaint</label>
                            <textarea name="complaint" rows="8" cols="80" class="form-control">{{ $complaint->complaint }}</textarea>
                            @error('complaint')
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
