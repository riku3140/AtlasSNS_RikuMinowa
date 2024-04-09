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
        $list=Post::get();
        return view('posts.index',['list' =>$list]);
    }

    public function createForm(Request $request){
        $user_id=Auth::user()->id;
        $post = $request->input('newPost');
        Post::create([
            'post' =>$post,
            'user_id' =>$user_id
        ]);
        return redirect('/top');
    }
}
