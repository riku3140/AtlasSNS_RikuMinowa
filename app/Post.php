<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Post extends Model
{
    protected $fillable = [
        'post','user_id','created_at',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
    // public function Users(){
    // return $this ->belongsTo('App\User'); //従テーブルから主テーブルのレコードを取得するメソッド
