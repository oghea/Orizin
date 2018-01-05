<?php

namespace App\Http\Controllers;

use App\Game;
use App\GamePurchased;
use App\Genre;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    public function manageGame()
    {
        $game = Game::all();
        return view('manage_games',compact('game'));
    }
    public function manageUser()
    {
        $user = User::all();
        return view('manage_user',compact('user'));
    }
    public function manageGenre()
    {
        $genre = Genre::all();
        return view('manage_genre',compact('genre'));
    }
    public function tambahGame()
    {
        $genre = Genre::all();
        return view('tambahGame',compact('genre'));
    }
    public function storeGame(Request $request)
    {
        $this->validate($request,[
            'game_name' => 'required',
            'price' => 'required',
            'date' => 'required',
            'images' => 'required',
            'genre' => 'required',
        ]);

        if ($request->hasFile('images')){
            if ($request->file('images')->isValid()){
                $name = Carbon::now()->timestamp.'.'.$request->file('images')->getClientOriginalExtension();
                $store_path = 'images/';
                $path = $request->file('images')->move($store_path, $name);
            }
        }

        $store = new Game();
        $store->game_name = $request['game_name'];
        $store->price = $request['price'];
        $store->date = $request['date'];
        $store->images = isset($name) ? $name : null;
        $store->genre = $request['genre'];
        $store->save();

        return redirect('/ManageGame');
    }
    public function tambahGenre()
    {
        return view('tambahGenre');
    }
    public function storeGenre(Request $request)
    {
        $this->validate($request,[
           'name' => 'required',
        ]);
        $store = new Genre();
        $store->name = $request['name'];
        $store->save();

        return redirect('/ManageGenre');
    }
    public function editGenre($id)
    {
        $editGenre = Genre::where('id',$id)->first();
        return view('editGenre',compact('editGenre'));
    }
    public function updateGenre(Request $request, $id)
    {
        $editGenre = Genre::where('id',$id)->first();
        $editGenre->name = $request['name'];
        $editGenre->update();
        return redirect('/ManageGenre');
    }
    public function tambahUser()
    {
        return view('tambahUser');
    }
    public function storeUser(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'dob' => 'required',
            'role' => 'required',
        ]);

        if ($request->hasFile('images')){
            if ($request->file('images')->isValid()){
                $name = Carbon::now()->timestamp.'.'.$request->file('images')->getClientOriginalExtension();
                $store_path = 'uploads/files/';
                $path = $request->file('images')->move($store_path, $name);
            }
        }

        $storeUser = new User();
        $storeUser->name = $request['name'];
        $storeUser->email = $request['email'];
        $storeUser->password = bcrypt($request['password']);
        $storeUser->images = isset($name) ? $name : null;
        $storeUser->dob = $request['dob'];
        $storeUser->role = $request['role'];
        $storeUser->save();

        return redirect('/ManageUser');
    }

    public function editUser($id)
    {
        $editUser = User::where('id',$id)->first();
        return view('editUser',compact('editUser'));
    }
    public function updateUser(Request $request,$id)
    {
        $this->validate($request,[
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'dob' => 'required',
            'role' => 'required',
            'images' => 'required'
        ]);

        if ($request->hasFile('images')){
            if ($request->file('images')->isValid()){
                $name = Carbon::now()->timestamp.'.'.$request->file('images')->getClientOriginalExtension();
                $store_path = 'uploads/files/';
                $path = $request->file('images')->move($store_path, $name);
            }
        }

        $editUser = User::where('id',$id)->first();
        $editUser->name = $request['name'];
        $editUser->email = $request['email'];
        $editUser->password = bcrypt($request['password']);
        $editUser->images = isset($name) ? $name : null;
        $editUser->dob = $request['dob'];
        $editUser->role = $request['role'];
        $editUser->update();

    }

    public function editGame($id)
    {
        $genre = Genre::all();
        $game_id = Game::where('id',$id)->first();
        return view('editGame',compact('game_id','genre'));
    }

    public function updateGame(Request $request, $id)
    {
        $this->validate($request,[
            'game_name' => 'required',
            'price' => 'required',
            'date' => 'required',
            'images' => 'required',
            'genre' => 'required',
        ]);

        if ($request->hasFile('images')){
            if ($request->file('images')->isValid()){
                $name = Carbon::now()->timestamp.'.'.$request->file('images')->getClientOriginalExtension();
                $store_path = 'images/';
                $path = $request->file('images')->move($store_path, $name);
            }
        }

        $store = Game::where('id',$id)->first();
        $store->game_name = $request['game_name'];
        $store->price = $request['price'];
        $store->date = $request['date'];
        $store->images = isset($name) ? $name : null;
        $store->genre = $request['genre'];
        $store->update();

        return redirect('/ManageGame');
    }

    public function manageTransaction()
    {
        $transaction = GamePurchased::all();
        return view('gameTransaction',compact('transaction'));
    }

    public function deleteUser($id)
    {
        $deleteUser = User::where('id',$id)->first();
        $deleteUser->delete();
        return redirect()->back();
    }
    public function deleteGenre($id)
    {
        $deleteGenre = Genre::where('id',$id)->first();
        $deleteGenre->delete();
        return redirect()->back();
    }

    public function deleteGame($id)
    {
        $deleteGame = Game::where('id',$id)->first();
        $deleteGame->delete();
        return redirect()->back();
    }

    public function deleteTransaction($id){
        $delete = GamePurchased::find($id);
        $delete->delete();
        return redirect()->back();
    }
}
