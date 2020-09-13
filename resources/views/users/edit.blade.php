@extends('layouts.global')

@section('title', 'Edit User')

@section('content')
    <div class="col-md-12">
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
    <hr class="my-2">
    <div class="card">
        <div class="card-header bg-primary"></div>
        <div class="card-body">
            <div class="container">
            <form enctype="multipart/form-data" class="bg-white p-2" action="{{ route('users.update', 
            [$user->id]) }}" method="POST">
            @csrf
            <input type="hidden" value="PUT" name="_method">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" value="{{ $user->name }}" class="form-control" placeholder="Full Name" 
                name="name" id="name">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" value="{{ $user->username }}" disabled class="form-control" placeholder="Username" 
                name="username" id="username">
            </div>
            <hr class="my-3">
            <label>Status</label>
            <br>            
            <div class="form-check-inline">
                <input {{ $user->status == 'ACTIVE' ? 'checked' : '' }} type="radio" value="ACTIVE" class="form-control" 
                id="active" name="status">
                <label for="active">Active</label>
            </div>
            <div class="form-check-inline">
                <input {{ $user->status == 'INACTIVE' ? 'checked' : '' }} type="radio" value="INACTIVE" class="form-control" 
                id="inactive" name="status">
                <label for="inactive">Inactive</label>
            </div>
            <hr class="my-3">
            <label>Roles</label>
            <br>
            <div class="form-check-inline">
                <input type="checkbox" {{ in_array("ADMIN", json_decode($user->roles)) ? 'checked' : '' }} 
                name="roles[]" id="ADMIN" value="ADMIN">
                <label for="ADMIN">Administrator</label>
            </div>
            <div class="form-check-inline">
                <input type="checkbox" {{ in_array("STAFF", json_decode($user->roles)) ? 'checked' : '' }} 
                name="roles[]" id="STAFF" value="STAFF">
                <label for="STAFF">Staff</label>
            </div>            
            <div class="form-check-inline">
                <input type="checkbox" {{ in_array("CUSTOMER", json_decode($user->roles)) ? 'checked' : '' }} 
                name="roles[]" id="CUSTOMER" value="CUSTOMER">
                <label for="CUSTOMER">Customer</label>
            </div>
            <hr class="my-3">
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" class="form-control" name="phone" value="{{ $user->phone }}" id="phone">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea name="address" id="address" class="form-control">{{ $user->address }}</textarea>
            </div>
                <label>Profile Picture</label>
                <p>Current Profile Picture: </p>
                 @if (empty($user->avatar))
                     <picture><img src="{{ asset('storage/avatars/default.png') }}" width="300px"></picture>
                 @else
                     <picture><img src="{{ asset('storage/'. $user->avatar) }}" class="img-thumbnail" alt="Loading.." width="300px">
                 @endif
                 <br>
                 <br>


            <div class="form-group">
                <input type="file" name="avatar" id="avatar" class="form-control">
                <small class="text-muted">Kosongkan jika tidak ingin mengubah avatar</small>
            </div>

        <hr class="my-3">
        <div class="form-group">
            <label for="email">E-Mail Address</label>
            <input type="email" id="email" name="email" value="{{ $user->email }}" placeholder="E-Mail Address" 
            class="form-control" disabled>
        </div>
        <button class="btn btn-primary" type="submit" value="Save">Save</button>
            </form>
            </div> 
        </div>
        <div class="card-footer"></div>
    </div>
</div>
@endsection
