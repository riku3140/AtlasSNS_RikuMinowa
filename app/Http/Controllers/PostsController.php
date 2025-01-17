<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;

class PostsController extends Controller
{
    //
    public function index(){
        $following_id = Auth::user()->follows()->pluck('followed_id');
        $user =Auth::user();
        $posts = Post::with('user')->whereIn('user_id', $following_id)-> orwhere('user_id' , $user->id) ->orderBy('created_at', 'desc')->get();
        return view('posts.index',['user' => $user ,'list'=>$posts,]);
}

    public function createForm(Request $request){

        $validatedData = $request->validate([
        'text' => 'required|string|min:1|max:150',
    ], [
        'text.required' => '投稿内容は必須です。',
        'text.min' => '投稿内容は1文字以上で入力してください。',
        'text.max' => '投稿内容は150文字以内で入力してください。',
    ]);

        $user_id=Auth::user()->id;
        $post = $request->input('text');
        Post::create([
            'post' =>$post,
            'user_id' =>$user_id
        ]);
        return redirect('/top');
    }

    public function delete($id){
        Post::where('id', $id)->delete();
        return redirect('/top');
    }

    public function postupdate(Request $request){
        $validatedData = $request->validate([
        'uppost' => 'required|string|min:1|max:150',
    ], [
        'uppost.required' => '投稿内容は必須です。',
        'uppost.min' => '投稿内容は1文字以上で入力してください。',
        'uppost.max' => '投稿内容は150文字以内で入力してください。',
    ]);
        $id = $request->input('id');
        $up_post = $request->input('uppost');
        Post::where('id',$id) -> update
        (['post' =>$up_post]);
        return response()->json(['success' => '投稿が更新されました！']);    }
}
