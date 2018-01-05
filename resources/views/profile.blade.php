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
                    <div class="panel-heading">Profile</div>

                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="col-md-4 text-center">
                                <img src="{{ asset('/uploads/files/'.\Illuminate\Support\Facades\Auth::user()->images) }}" style="height: 200px; width:200px; border-radius: 50%; border: 1px solid lightblue" alt="">
                                <form action="{{ route('updateProfile',\Illuminate\Support\Facades\Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <br>
                                    <input class="form-control" type="file" name="images">
                                    <input type="submit" style="margin-top: 10px" class="btn btn-info btn-sm" value="
Update Profile Picture">
                                </form>
                            </div>
                            {{--<div class="col-md-1"></div>--}}
                            <div class="col-md-8">
                                <strong>Name : {{ \Illuminate\Support\Facades\Auth::user()->name }}</strong><br>
                                <strong>E-mail : {{ \Illuminate\Support\Facades\Auth::user()->email }}</strong><br>
                                <strong>Date of Birth : {{ \Illuminate\Support\Facades\Auth::user()->dob }}</strong>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
