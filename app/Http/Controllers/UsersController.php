<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;

class UsersController extends Controller
{
    public function profile(){
        return view('users.profile');
    }

    //プロフィールの更新
    public function updateProfile(Request $request){
        $id= $request -> input('id');
        $username = $request -> input('username');
        $mail = $request -> input('mail');
        $password = $request -> input('password');
        $bio = $request -> input('bio');
        $dir = 'img';
        $request ->file('images')->store('public/'.$dir);

        User::where('id',$id)->update([
            'username' => $username,
            'mail' => $mail,
            'password' => Hash::make($request->password),
            'bio' => $bio,
            'image'=> $image,

        ]);
        return redirect('/top');
    }
//ユーザー検索
    public function search(Request $request){
        $user = Auth::user();
        $keyword = $request -> input('keyword');
        if(!empty($keyword)){
            $query = User::query();
            $query->where('username' , 'LIKE' , "%{$keyword}%")->where('id' ,'!=', Auth::id());//自分を除く記述　whereを繋げる
            $users = $query->get();
            return view('/users/search' , ['users' => $users,'keyword' =>$keyword]);
        }
        else{
            $users = User::where('id' ,'!=', Auth::user()->id)->get(); //自分以外　User::where
            return view ('/users/search', ['users' => $users,'keyword' => $keyword]);
        }
    }

    public function posts(){
        return $this->hasMany('App\Post');
    }



//フォロー、フォロー解除
    public function follow(User $user){
        $user = Auth::user();
        $follower = auth()->user();
        $is_following = $follower->isFollowing($user->id);
        if (!$is_following){
            $follower->follow($user->id);
        }
        return back();
    }

    public function unfollow(User $user){
        $user = Auth::user();
        $follower = auth()->user();
        $is_following = $follower->isFollowing($user->id);
        if($is_following){
            $follower->unfollow($user->id);
        }
        return back();

    }


}
