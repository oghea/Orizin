@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">All Product</div>

                    <div class="panel-body">
                        @if($game->isEmpty())
                            Empty!
                            @else
                        @foreach($game as $gm)
                            <div class="col-md-4">
                                <a href="{{ route('detail.game',$gm->id) }}"><img src="{{ asset('/images/'.$gm->images) }}" alt="" style="border: 1px solid lightblue;height: 350px; width: 250px">
                                    {{ $gm->game_name }}<br>
                                    Rp. {{ $gm->price }}</a><br>
                                @if(\Illuminate\Support\Facades\Auth::check())
                                    @if(\Illuminate\Support\Facades\Auth::user()->name !== "Admin")
                                        Add to Cart : <br>
                                        <a style="font-size: 40px; padding-left: 10px" href="{{ route('gettocart',$gm->id) }}"><i class="fa fa-cart-plus"></i></a>
                                    @endif
                                @else
                                    Login if you want buy the game
                                @endif
                            </div>
                        @endforeach
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
