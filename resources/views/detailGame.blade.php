@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Game Details {{ $detail->game_name }}</div>

                    <div class="panel-body">
                        <div class="col-md-4 text-center">
                            <img src="{{ asset('images/'.$detail->images) }}" alt="" style="height: 350px; width: 250px; border: 1px solid lightblue">
                        </div>

                        <div class="col-md-8">

                        <b style="font-size: 20px;">{{ $detail->game_name }}</b>
                        <p>Genre : {{ $detail->Genre->name }}</p>
                            @if($rate1->isEmpty())
                                Rating *1 : 0 votes<br>
                            @else
                                @foreach($rate1 as $key => $rt1)
                                    Rating *1 : {{ count($rt1->rate) }} votes
                                @endforeach
                                <br>
                            @endif
                            @if($rate2->isEmpty())
                                Rating *2 : 0 votes<br>
                            @else
                                @foreach($rate2 as $key => $rt2)
                                    Rating *2 : {{ count($rt2->rate) }} votes
                                @endforeach
                            @endif
                            @if($rate2->isEmpty())
                                Rating *3 : 0 votes<br>
                            @else
                            @foreach($rate3 as $key => $rt3)
                                Rating *3 : {{ count($rt3->rate) }} votes
                            @endforeach
                            @endif
                            @if($rate4->isEmpty())
                                Rating *4 : 0 votes<br>
                            @else
                                @foreach($rate4 as $key => $rt4)
                                    Rating *4 : {{ count($rt4->rate) }} votes
                                @endforeach
                            @endif
                            @if($rate5->isEmpty())
                                Rating *5 : 0 votes<br>
                            @else
                                @foreach($rate5 as $key => $rt5)
                                    Rating *5 : {{ count($rt5->rate) }} votes
                                @endforeach
                            @endif

                        <form action="{{ route('rating') }}" method="post" style="margin-top: 10px">
                                {{ csrf_field() }}
                        Rate This Game :
                            <input type="hidden" name="game_id" value="{{ $detail->id }}">
                            <input type="hidden" name="users" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">
                        <select name="rate" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                            <small>Rate 1-5</small>
                            <br>
                            <input type="submit" value="RATE!" class="btn btn-info">

                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
