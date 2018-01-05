<?php

namespace App\Http\Controllers;

use App\Game;
use App\Rating;
use Illuminate\Http\Request;

use App\Http\Requests;

class WebController extends Controller
{
    public function detailGame($id)
    {
        $rate1 = Rating::where('game_id',$id)->where('rate','=',1)->get();
        $rate2 = Rating::where('game_id',$id)->where('rate','=',2)->get();
        $rate3 = Rating::where('game_id',$id)->where('rate','=',3)->get();
        $rate4 = Rating::where('game_id',$id)->where('rate','=',4)->get();
        $rate5 = Rating::where('game_id',$id)->where('rate','=',5)->get();
        $detail = Game::where('id',$id)->first();
        return view('detailGame',compact('detail','rate1','rate2','rate3','rate4','rate5'));
    }
}
