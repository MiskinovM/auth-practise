@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1 class="fs-3 my-4">Dashboard</h1>

        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
@endsection
