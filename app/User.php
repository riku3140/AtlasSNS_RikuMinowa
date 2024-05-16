<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
 //ユーザーがフォローしている、人数の取得
    public function follows(){
        return $this -> belongsToMany('App\User','follows','following_id','followed_id');
    }

    public function follow(){
        return $this -> belongsToMany('App\User','follows','following_id','followed_id');
    }

    //ユーザーをフォローしている、フォロワー人数の取得
    public function follower(){
        return $this ->belongsToMany('App\User','follows', 'following_id','following_id');
    }

    //フォロー人数の取得
    public function isFollowing(Int $user_id){
        return (boolean) $this ->follows() -> where('followed_id',$user_id)->first();

    }

    //フォロワー人数の取得
    public function isFollowed(Int $user_id){
        return (boolean) $this -> followers() -> where('following_id',$user_id) ->first(['follows.id']);
    }

}
