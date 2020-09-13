@extends('layouts.global')

@section('title', 'User List')

@section('content')
    <div class="col-md-12">
        @if (session('status'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ session('status') }}
            </div>

        @endif
        <hr class="my-2">
        <div class="row">
            <div class="col-md-9">
                <a class="btn btn-primary btn-lg mb-2 ml-0" href="{{ route('users.create') }}">Create User</a>
            </div>
            <div class="col">
                <form class="" action="{{ route('users.index') }}">
                    <div class="input-group float-right">
                        <input class="form-control" type="text" id="myInput" onkeyup="myFunction()"
                            placeholder="Search for names..">
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" id="myTable">
            <thead class="thead-light">
                <tr>
                    <th scope="col" style="font-weight: bold">No</th>
                    <th scope="col" style="font-weight: bold">Name</th>
                    <th scope="col" style="font-weight: bold">Username</th>
                    <th scope="col" style="font-weight: bold">Email</th>
                    <th scope="col" style="font-weight: bold">Avatar</th>
                    <th scope="col" style="font-weight: bold">Created by</th>
                    <th scope="col" style="font-weight: bold">Action</th>
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
                            @if (empty($user->avatar))
                                <img src="{{ asset('storage/avatars/default.png') }}" width="70px">
                            @else
                                <img src="{{ asset('storage/' . $user->avatar) }}" alt="" width="70px">
                            @endif
                        </td>
                        <td>{{ $user->created_by }}</td>
                        <td>
                            <a class="btn btn-info text-white btn-sm" href="{{ route('users.edit', [$user->id]) }}">Edit</a>
                            <button class="btn btn-danger btn-sm" type="button" data-toggle="modal"
                                data-target="#myModal">Delete</button>
                            <a href="{{ route('users.show', [$user->id]) }}" class="btn btn-success btn-sm">Detail</a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="10">{{ $users->links() }}</td>
                </tr>
            </tfoot>
        </table>
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body">
                        <p>Delete user ini ???</p>
                    </div>
                    <div class="modal-footer bg-light">
                        <form action="{{ route('users.destroy', [$user->id]) }}" class="d-inline" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                        </form>
                        <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    @endsection

    @section('footer_scripts')
        <script>
            function myFunction() {
                // Declare variables
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTable");
                tr = table.getElementsByTagName("tr");

                // Loop through all table rows, and hide those who don't match the search query
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[1];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }

        </script>
    @stop
