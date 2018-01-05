@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Manage Users</div>

                    <div class="panel-body">
                        <a href="{{ route('tambahUser') }}"><i class="fa fa-plus"></i> Tambah User</a>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>E-mail</th>
                                <th>Date of Birth</th>
                                <th>Picture</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user as $key => $us)
                                <tr>
                                    <td>{{ $key+1 }}.</td>
                                    <td>{{ $us->name }}</td>
                                    <td>{{ $us->email }}</td>
                                    <td>{{ $us->dob }}</td>
                                    <td>{{ $us->images }}</td>
                                    <td>
                                        <a href="{{ route('edit.user',$us->id) }}"><i class="fa fa-edit"></i></a> |
                                        <a href="{{ route('delete.user',$us->id) }}"><i class="fa fa-trash"></i></a>
                                    </td>
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
