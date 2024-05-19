<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FollowsController extends Controller
{
    //
    public function followsList(){
        return view('follows.followList');
    }

    public function followerList(){
        return view('follows.followerList');
    }

    public function follow($userId)
    {
        // フォローしているか
        $follower = auth()->user();
        $is_following = $follower->isFollowing($userId);

        // フォローしていなかったら下記のフォロー処理を実行
        if (!$is_following) {


            // 自分のユーザーIDを取得
            $loggedInUserId = auth()->user()->id;
            // フォローしたい人のユーザーIDを元にユーザーを取得
            $followedUser = User::find($userId);
            $followedUserId = $followedUser->id;
            // フォローデータをデータベースに登録
            Follow::create([
                'following_id' => $loggedInUserId,
                'followed_id' => $followedUserId,
            ]);
            return redirect('/search'); // フォロー後に元のページにリダイレクト
        }
    }

    public function unfollow($userId)
    {
        // フォローしているか
        $follower = auth()->user();
        $is_following = $follower->isFollowing($userId);

        // フォローしていれば下記のフォロー解除を実行する
        if ($is_following) {


            $loggedInUserId = auth()->user()->id;
            Follow::where([
                ['followed_id', '=', $userId],
                ['following_id', '=', $loggedInUserId],
            ])
                ->delete();
        }
        return redirect('/search');
    }


}
