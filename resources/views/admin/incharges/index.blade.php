@extends('layouts.main')

@section('title', 'Incharge Management')

@section('content')
<div class="container-fluid">
    <div class="header">
        <div class="row">
            <div class="col-md-6">
                <h1 class="header-title">
                    Incharges
                </h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        <!-- <li class="breadcrumb-item"><a href="#">Pages</a></li> -->
                        <li class="breadcrumb-item active" aria-current="page">Incharges</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6">
                <div class="pull-right mt-4">
                    <!-- <a href="{{ route('admin.assign-department.create') }}" class="btn btn-primary">Assign Department</a> -->
                    <a href="{{ route('admin.incharges.create') }}" class="btn btn-primary">Create Incharge</a>
                </div>
            </div>
        </div>
        @if (session('success'))
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
                    <table id="datatables-clients" class="table table-striped" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Departments</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($incharges as $key => $incharge)
                            @php
                                $departments = $incharge->departments;
                            @endphp
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $incharge->name }}</td>
                                <td>{{ $incharge->email }}</td>
                                <td>
                                    @foreach ($departments as $department)
                                        <span class="badge bg-success">{{ optional($department->department)->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('admin.incharges.edit',  $incharge->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="javascript:void(0)" data-href="{{ route('admin.incharges.destroy', $incharge->id) }}" class="btn btn-danger" onclick="confirmDelete(this)">Delete</a>
                                    <form class="" action="{{ route('admin.incharges.destroy', $incharge->id) }}" method="post" id="delete-form">
                                        @csrf
                                        @method('DELETE')
                                    </form>
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

@section('extra-script')
<script type="text/javascript">
$("#datatables-clients").DataTable({
    responsive: true,
    order: [
        [0, "asc"]
    ]
});

function confirmDelete(el) {
    var _href = $(el).data('href');
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this incharge!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            $('#delete-form').submit();
            // window.location.href = _href;
        }
    });
}
</script>
@endsection
