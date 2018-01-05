@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Tambah Game</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('game.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('game_name') ? ' has-error' : '' }}">
                                <label for="game_name" class="col-md-4 control-label">Game Name</label>

                                <div class="col-md-6">
                                    <input id="game_name" type="text" class="form-control" name="game_name" value="{{ old('game_name') }}">

                                    @if ($errors->has('game_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('game_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                <label for="price" class="col-md-4 control-label">Price</label>

                                <div class="col-md-6">
                                    <input id="price" type="text" class="form-control" name="price" value="{{ old('price') }}">

                                    @if ($errors->has('price'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Date Release</label>

                                <div class="col-md-6">
                                    <input id="name" class="form-control" type="date" name="date" value="{{ old('date') }}">

                                    @if ($errors->has('date'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('genre') ? ' has-error' : '' }}">
                                <label for="price" class="col-md-4 control-label">Genre</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="genre">
                                        @foreach($genre as $gn)
                                            <option value="{{ $gn->id }}"> {{ $gn->name }}</option>
                                        @endforeach
                                    </select>

                                @if ($errors->has('genre'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('genre') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('images') ? ' has-error' : '' }}">
                                <label for="images" class="col-md-4 control-label">Picture</label>

                                <div class="col-md-6">
                                    <input id="images" class="form-control" type="file" name="images" value="{{ old('images') }}">

                                    @if ($errors->has('images'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('images') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i> Insert
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
