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
        $posts = Post::orderBy('created_at', 'desc')->get();
        $user =Auth::user();
        return view('posts.index',['user' => $user ,'list'=>$posts,]);
}

    public function createForm(Request $request){
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
        $id = $request->input('id');
        $up_post = $request->input('uppost');
        Post::where('id',$id) -> update
        (['post' =>$up_post]);

        return redirect('/top');
    }
}
