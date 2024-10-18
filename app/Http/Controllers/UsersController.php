<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;
use App\Post;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    public function profile($id = null){

        if($id == null){
        return view('users.profile');
        }

        $user = User::where('id',$id)->first();
        $posts = Post::with(['user'])->where('user_id',$id)->orderBy('created_at','desc')->get();

        return view('users.otherprofile',compact('user','posts'));
    }



    //プロフィールの更新
    public function updateProfile(Request $request){
        $id= $request -> input('id');
        $username = $request -> input('username');
        $mail = $request -> input('mail');
        $password = $request -> input('password');
        $bio = $request -> input('bio');

       $validatedData = $request->validate([
        'username' => 'required|string|min:2|max:12',
        'mail' => [
            'required',
            'email',
            'min:5',
            'max:40',
            Rule::unique('users', 'mail')->ignore($request->user()->id),
        ],
        'password' => 'nullable|string|regex:/^[a-zA-Z0-9]+$/|min:8|max:20|confirmed',
        'bio' => 'nullable|string|max:150',
        'images' => 'nullable|image|mimes:jpg,png,bmp,gif,svg|max:2048',
    ]);

        $user = User::find($id);


        if ($request->hasFile('images')) {
        $dir = 'img';
        $image = $request->file('images')->store('storage/'); // 画像登録処理
        $filename = basename($image);
    } else {
        // 画像のアップロードがない場合、既存の画像を使用
        $filename = $user->images;
    }

        User::where('id',$id)->update([
            'username' => $username,
            'mail' => $mail,
            'password' => Hash::make($request->password),
            'bio' => $bio,
            'images'=> $filename,

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
