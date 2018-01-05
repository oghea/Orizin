@extends('layouts.app')

@section('content')
    @if(Session::has('massage'))
    <div class="alert alert-success">
        {{ Session::get('message') }}
    </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">My Games</div>

                    <div class="panel-body">
                        @if($game->isEmpty())
                            No Game!
                            @else
                        @foreach($game as $gm)
                            <div class="col-md-4">
                                <img src="{{ asset('/images/'.$gm->Games->images) }}" alt="" style="border: 1px solid lightblue;height: 350px; width: 250px">
                                    {{ $gm->Games->game_name }}<br>
                                    QTY : {{ $gm->qty }} items<br>
                            </div>
                        @endforeach
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
