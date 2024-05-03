<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UsersController extends Controller
{
    public function profile(){
        return view('users.profile');
    }

    public function search(Request $request){
        $user = Auth::user();

        $keyword = $request -> input('keyword');

        if(!empty($keyword)){
            $query = User::query();
            $query->where('username' , 'LIKE' , "%{$keyword}%")->where('id' ,'!==', Auth::id());//自分を除く記述　whereを繋げる
            $users = $query->get();
            return view('/users/search' , ['users' => $users,'keyword' =>$keyword]);
        }
        else{
            $users = User::where('id' ,'!=', Auth::user()->id)->get(); //自分以外　User::where
            return view ('/users/search', ['users' => $users,'keyword' => $keyword]);
        }
    }

    // public function isFollowed(){

    // }
}
