@extends('layouts.global')

@section('title', 'List Permit')

@section('content')
    <div class="col-md-12">
        @if (session('status'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ session('status') }}
            </div>
        @endif
        <hr class="my-3">         
        <div class="row">
            <div class="col-md-9">
                <a class="btn btn-primary btn-lg mb-2 ml-0" href="{{ route('permits.create') }}">Create User</a>
            </div>
            <div class="col">
                <form class="" action="{{ route('permits.index') }}">
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
                    <th scope="col" style="font-weight: bold">Nama Permit</th>
                    <th scope="col" style="font-weight: bold">Kegiatan</th>
                    <th scope="col" style="font-weight: bold">Created by</th>
                    <th scope="col" style="font-weight: bold">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permits as $index => $permit)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $permit->nama_permit }}</td>
                        <td>{{ $permit->purpose }}</td>                                            
                        <td>{{ $permit->created_by }}</td>
                        <td>
                            <a class="btn btn-info text-white btn-sm" href="{{ route('permits.edit', [$permit->id]) }}">Edit</a>
                            <button class="btn btn-danger btn-sm" type="button" data-toggle="modal"
                                data-target="#myModal">Delete</button>
                            <a href="{{ route('permits.show', [$permit->id]) }}" class="btn btn-success btn-sm">Detail</a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="10">{{ $permits->links() }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
    