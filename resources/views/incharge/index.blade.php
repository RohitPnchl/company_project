@extends('layouts.main')

@section('title', 'Incharge')

@section('content')
<main class="content">
    <div class="container-fluid">
        <div class="header">
            <h1 class="header-title">
                Welcome back, {{ \Auth::user()->name }}!
            </h1>
        </div>
    </div>
</main>
@endsection

@section('extra-script')

@endsection
