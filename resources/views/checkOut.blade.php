@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Check Out</div>

                    <div class="panel-body">
                        <form action="{{ route('store.Checkout') }}" method="POST">
                            {{ csrf_field() }}
                            @if(Session::has('cart'))
                                @foreach($product as $key => $product)
                                    <div class="col-md-12" style="padding-bottom: 10px;">
                                        <input type="hidden" name="users[{{ $key }}]" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">
                                        <input type="hidden" name="qty[{{ $key }}]" value="{{ $product['qty'] }}">
                                        <input type="hidden" name="game_id[{{ $key }}]" value="{{ $product['item']['id'] }}">
                                        <strong style="font-size: 30px">{{ $product['item']['game_name'] }} <span class="badge">{{ $product['qty'] }}</span></strong><br>
                                        <p>Release Date : {{ $product['item']['date'] }}</p>
                                        Rp. {{ $product['price'] }} | {{ $product['qty'] }} Items

                                    </div>
                                @endforeach
                                    <input type="hidden" name="game_qty" value="{{ $totalQty }}">
                                    <input type="hidden" name="total_price" value="{{ $totalPrice }}">
                                    <input type="hidden" name="user_id" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">
                            <div class="panel-body">
                                <div class="col-md-12" style="padding-top: 10px; padding-bottom: 15px; border: 1px solid black">
                                    Total Items : {{ $totalQty }} <br>
                                    Total Price : {{ $totalPrice }} <br><br>
                                    <input type="submit" value="Check Out Now!" class="btn btn-success">
                                </div>
                            </div>
                            @endif

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
