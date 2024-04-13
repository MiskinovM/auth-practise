@extends('layouts.layout')


@section('content')
    <div class="container">
        <h1 class="fs-3 my-4 text-center">Registration Page</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('user.store') }}">
            @csrf
            <div class="mb-3">
                <label for="nameInput" class="form-label">Name</label>
                <input type="text" class="form-control" id="loginInput" name="name" value="{{ old('name') }}">
            </div>
            <div class="mb-3">
                <label for="loginInput" class="form-label">Email</label>
                <input type="email" class="form-control" id="loginInput" name="email" value="{{ old('email') }}">
            </div>
            <div class="mb-3">
                <label for="passwordInput" class="form-label">Password</label>
                <input type="password" class="form-control" id="passwordInput" name="password">
            </div>
            <div class="mb-3">
                <label for="passwordConfirmationInput" class="form-label">Confirm password</label>
                <input type="password" class="form-control" id="passwordConfirmationInput" name="password_confirmation">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
