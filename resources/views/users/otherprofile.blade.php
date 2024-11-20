@extends('layouts.login')

@section('content')
<div class="container">
  <div class="otherprofile">
   <img src="{{ asset('storage/images/'. Auth::user()->images) }}" class="icon-image">
   <a href="{{ route('profile.show',['id' => $user ->id]) }}">ユーザーのプロフィール</a>
  <p>ユーザー名:{{ $user->username }}</p>
  <p>自己紹介:{{ $user->bio }}</p>
  <td>
      @if (auth()->user()->isFollowing($user->id))
      <form action="{{route('unfollow',$user->id)}}" method="post">
        @csrf
        <button type="submit" name="btn btn-danger">フォロー解除</button>
      </form>
      @else

      <form action="{{route('follows',$user->id)}}" method='post'>
        @csrf
       <button type="submit" name="btn btn-danger">フォローする</button>
      </form>
      @endif
    </td>
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
