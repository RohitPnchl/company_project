@extends('layouts.main')

@section('title', 'Complaints Management')

@section('content')
<div class="container-fluid">
    <div class="header">
        <div class="row">
            <div class="col-md-6">
                <h1 class="header-title">
                    User Complaints
                </h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        <!-- <li class="breadcrumb-item"><a href="#">Pages</a></li> -->
                        <li class="breadcrumb-item active" aria-current="page">User Complaints</li>
                    </ol>
                </nav>
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
                                <th>User</th>
                                <th>User email</th>
                                <th>Department</th>
                                <th>Complaint</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($complaints as $key => $complaint)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $complaint->user->name }}</td>
                                <td>{{ $complaint->user->email }}</td>
                                <td>{{ $complaint->department->name }}</td>
                                <td>{{ substr($complaint->complaint, 0, 50) }}</td>
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
        text: "Once deleted, you will not be able to recover this complaint!",
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
