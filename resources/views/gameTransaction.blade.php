@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Games</div>

                    <div class="panel-body">

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>User Name</th>
                                <th>Games</th>
                                <th>Qty</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($transaction->isEmpty())
                                <tr>
                                    <td> No Transaction!</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                @else
                            @foreach($transaction as $key => $trans)
                                <tr>
                                    <td>{{ $key+1 }}.</td>
                                    <td>{{ $trans->Users->name }}</td>
                                    <td>{{ $trans->Games->game_name }}</td>
                                    <td>{{ $trans->qty }}</td>
                                    <td>
                                        <a href="{{ route('deleteTransaction',$trans->id) }}"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
