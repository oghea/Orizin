@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Games</div>

                    <div class="panel-body">
                        <a href="{{ route('tambahGame') }}"><i class="fa fa-plus"></i> Tambah Game</a>

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Game Name</th>
                                <th>Genre</th>
                                <th>Release Date</th>
                                <th>Picture</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($game as $key => $gm)
                                <tr>
                                    <td>{{ $key+1 }}.</td>
                                    <td>{{ $gm->game_name }}</td>
                                    <td>{{ $gm->Genre->name }}</td>
                                    <td>{{ $gm->date }}</td>
                                    <td>{{ $gm->images }}</td>
                                    <td>
                                        <a href="{{ route('edit.game',$gm->id) }}"><i class="fa fa-edit"></i></a> |
                                        <a href="{{ route('delete.game',$gm->id) }}"><i class="fa fa-trash"></i></a>
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
