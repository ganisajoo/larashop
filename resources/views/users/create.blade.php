@extends('layouts.global')

@section('title', 'Create New User')

@section('content')
    <div class="col-md-10">
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        <div class="card">
            <div class="card-header">Create New User</div>
            <div class="card-body">

                <form enctype="multipart/form-data" class="bg-white p-3" action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" placeholder="Full Name" type="text" name="name" id="name">
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input class="form-control" placeholder="Username" type="text" name="username" id="username">
                    </div>
                    <br>
                    <label for="">Roles</label>
                    <br>
                    <div class="form-check-inline">
                        <input type="checkbox" name="roles[]" id="ADMIN" value="ADMIN">
                        <label for="ADMIN">Administrator</label>
                    </div>
                    <div class="form-check-inline">
                        <input type="checkbox" name="roles[]" id="STAFF" value="STAFF">
                        <label for="STAFF">Staff </label>
                    </div>
                    <div class="form-check-inline">
                        <input type="checkbox" name="roles[]" id="CUSTOMER" value="CUSTOMER">
                        <label for="CUSTOMER">Customer</label>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" name="phone" class="form-control" id="phone">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address" id="address" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="avatar">Profile Picture</label>
                        <input type="file" id="avatar" name="avatar" class="form-control">
                    </div>
                    <hr class="my-3">
                    <div class="form-group">
                        <label for="email">E-Mail</label>
                        <input type="text" name="email" id="email" placeholder="E-Mail Address" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Password Confirmation</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg" value="Save">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
