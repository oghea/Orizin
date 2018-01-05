@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading text-center"><i class="fa fa-shopping-cart"></i> Shopping Cart <a style="margin-left: 10px" class="btn btn-info btn-sm " href="{{ route('checkout') }}"><i class="fa fa-money"></i> Check Out</a></div>

                    <div class="panel-body">
                        @if(Session::has('cart'))
                            @foreach($product as $product)
                            <div class="col-md-12" style="padding-bottom: 10px">
                                <div class="col-md-4">
                                    <img src="{{ asset('/images/'.$product['item']['images']) }}" alt="" style="border: 1px solid lightblue;height: 350px; width: 250px">
                                </div>
                                <div class="col-md-8">
                                    <strong style="font-size: 30px">{{ $product['item']['game_name'] }} <span class="badge">{{ $product['qty'] }}</span></strong><br>
                                    <p>Release Date : {{ $product['item']['date'] }}</p>
                                    Rp. {{ $product['price'] }} | {{ $product['qty'] }} Items<br>
                                    <br>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <h3>No Items in Cart!</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{--@if(Session::has('cart'))--}}
    {{--@foreach($product as $pro)--}}
        {{--{{ $pro['qty'] }}--}}
        {{--Rp. {{ $pro['price'] }}--}}
    {{--@endforeach--}}
{{--@else--}}

{{--@endif--}}
