@extends('layouts.login')

@section('content')
  <ul class="otherprofile">
   <img src="{{ asset('storage/images/'. Auth::user()->images) }}" class="user-image">
   <div class="other-content">
     <li class="other-name">
       <span class="label">ユーザー名</span>
       <span class="value">{{ $user->username }}</span>
      </li>
      <li class="other-bio">
       <span class="label">自己紹介</span>
       <span class="value">{{ $user->bio }}</span>
      </li>
   </div>
   <div class="other-follow">
      @if (auth()->user()->isFollowing($user->id))
      <form action="{{ route('unfollow', $user->id) }}" method="post">
        @csrf
        <button type="submit" class="unfollow-btn">フォロー解除</button>
      </form>
      @else
      <form action="{{ route('follows', $user->id) }}" method='post'>
        @csrf
        <button type="submit" class="follow-btn">フォローする</button>
      </form>
      @endif
   </div>
</ul>
<div class="separator"></div>

@foreach($posts as $post)
<ul class="post-item">
  <li class="post-name"><img src="{{ asset('storage/' .$post->user->images) }}" alt="フォローアイコン"></li>
  <div class="post-content">
    <li class="post-username">{{ $post->user->username }}</li>
    <li class="post-text">{{ $post->post }}</li>
  </div>
  <div class="post-actions">
    <li class="post-date">{{  $post->created_at  }}</li>
  </div>
</ul>
  @endforeach
@endsection
