@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Genre</div>

                    <div class="panel-body">
                        <a href="{{ route('tambahGenre') }}"><i class="fa fa-plus"></i> Tambah Genre</a>

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Genre</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($genre as $key => $gn)
                                <tr>
                                    <td>{{ $key+1 }}.</td>
                                    <td>{{ $gn->name }}</td>
                                    <td>
                                        <a href="{{ route('edit.genre',$gn->id) }}"><i class="fa fa-edit"></i></a> |
                                        <a href="{{ route('delete.genre',$gn->id) }}"><i class="fa fa-trash"></i></a>
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
