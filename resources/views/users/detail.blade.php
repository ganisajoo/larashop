@extends('layouts.global')

@section('title', 'User Profile')

@section('content')

    <div class="col-md-12">
        <hr class="my-2">
        <div class="card">
            <div class=" card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-1">
                            @if (empty($user->avatar))
                                <img src="{{ asset('storage/avatars/default.png') }}"
                                    style="width: 150px; height: 150px; float: left; border-radius:50%; margin-right:25px;">
                            @else
                                <img src="{{ asset('storage/' . $user->avatar) }}"
                                    style="width: 150px; height: 150px; float: left; border-radius:50%; margin-right:25px;">
                            @endif
                            <h2>{{ $user->name }}</h2>
                            <p>{{ $user->roles }}</p>

                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
