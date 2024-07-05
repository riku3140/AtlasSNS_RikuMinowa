@extends('layouts.login')

@section('content')

<div class="otherprofile">
   {!! Form::open(['url' => 'users/{id}/profile','enctype' => "multipart/form-data"]) !!}
    @csrf
   <img src="{{ asset('storage/user-images/'. Auth::user()->images) }}" class="icon-image">
   <a href="{{ route('profile'=> $user->id)}}">ユーザーのプロフィール</a>
  <p>ユーザー名:{{ $post->user->username }}</p>
  <p>自己紹介:{{ $user->自己紹介 }}</p>
</div>
