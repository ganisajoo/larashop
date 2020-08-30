@extends('layouts.global')

@section('title', 'User List')

@section('content')
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">@yield('title')</div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Avatar</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $user)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if ($user->avatar)
                                        <img src="{{ asset('storage/' . $user->avatar) }}" width="70px">
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>[TODO: actions]</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
