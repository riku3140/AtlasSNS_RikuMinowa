@extends('layouts.login')

@section('content')
<div class="container">
  <div class="otherprofile">
   <img src="{{ asset('storage/user-images/'. Auth::user()->images) }}" class="icon-image">
   <a href="{{ route('profile.show',['id' => $user ->id]) }}">ユーザーのプロフィール</a>
  <p>ユーザー名:{{ $user->username }}</p>
  <p>自己紹介:{{ $user->profile }}</p>
  </div>
</div>

<div class="otherprofile-post">
  @foreach($posts as $post)
  <a><img src="{{ asset('storage/' .$post->user->images) }}" alt="フォローアイコン"></a>
    <p>名前:{{ $post->user->username }}</p>
    <p>投稿内容:{{ $post->post }}</p>
    <p>{{  $post->created_at  }}</p>
    @endforeach
</div>

@endsection
