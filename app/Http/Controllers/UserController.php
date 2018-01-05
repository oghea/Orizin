<?php

namespace App\Http\Controllers;

use App\Cart;
use App\CheckOut;
use App\Game;
use App\GamePurchased;
use App\Rating;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function profile()
    {
        return view('profile');
    }

    public function updateProfile(Request $request,$id)
    {
        $this->validate($request,[
           'images' => 'required',
        ]);
        if ($request->hasFile('images')){
            if ($request->file('images')->isValid()){
                $name = Carbon::now()->timestamp.'.'.$request->file('images')->getClientOriginalExtension();
                $store_path = 'uploads/files/';
                $path = $request->file('images')->move($store_path, $name);
            }
        }
        $update = User::where('id',$id)->first();
        $update->images = isset($name) ? $name : null;
        $update->update();
        return redirect('/profile')->with('message','Success Update Profile Picture!');
    }

    public function myGames()
    {
        $game = GamePurchased::where('users','=',Auth::user()->id)->get();
        return view('myGames',compact('game'));
    }

    public function rateGames(Request $request)
    {
        $this->validate($request,[
            'users' => 'required',
            'game_id' => 'required',
            'rate' => 'required'
        ]);
        $rate = new Rating();
        $rate->users = $request['users'];
        $rate->game_id = $request['game_id'];
        $rate->rate = $request['rate'];
        $rate->save();

        return redirect()->back()->with('message','Thank you!');
    }

    public function allProduct()
    {
        $game = Game::all();
        return view('allProduct',compact('game'));
    }

    public function getAddToCart(Request $request,$id)
    {
        $product = Game::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart',$cart);
        return redirect()->back();
    }
    public function shoppingCart()
    {
        if (!Session::has('cart')){
            return view('shoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shoppingCart',['product' => $cart->items,'totalPrice' => $cart->totalPrice, 'totalQty' => $cart->totalQty]);
    }

    public function checkOut()
    {
        if (!Session::has('cart')){
            return view('shoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('checkOut',['product' => $cart->items,'totalPrice' => $cart->totalPrice, 'totalQty' => $cart->totalQty]);
    }

    public function storeCheckout(Request $request)
    {
        $this->validate($request,[
            'user_id' => 'required',
            'game_qty' => 'required',
            'total_price' => 'required',
            'users.*' => 'required',
            'game_id.*' => 'required',
            'qty.*' => 'required',
        ]);

        $store = new CheckOut();
        $store->user_id = $request['user_id'];
        $store->game_qty = $request['game_qty'];
        $store->total_price = $request['total_price'];
        $store->save();
        foreach ($request->users as $key => $user_id) {
            $game = array(
                'users' => $user_id,
                'game_id' => $request->game_id[$key],
                'qty' => $request->qty[$key]
            );
            GamePurchased::insert($game);
        }
        Session::forget('cart');
        return redirect('/MyGames/'.Auth::user()->id)->with('message','Successfully Purchased!!');
    }
}
