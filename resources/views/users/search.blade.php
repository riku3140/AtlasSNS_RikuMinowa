@extends('layouts.login')

@section('content')

<form action="/search" method="post" class="search-form">
  @csrf
  <input type="text" name="keyword" class="form" placeholder="ユーザー名">
  <button type="submit" class="btn-success">
    <img src="/images/search.png" alt="検索" class="search-icon">
  </button>
</form>
@if (!empty($keyword))
<p>検索ワード : {{ $keyword}}</p>
@endif


@if(isset($user)and!(Auth::user()==$user)and(isset($keyword)))
@endif

<div class="separator"></div>

@if(isset($users))
<table class="user-table">
  @foreach($users as $user)
  <tr class="user-row">
    <td class="user-icon"><img src="{{asset('storage/'.$user->images)}}" alt="ユーザーアイコン"></td>
    <td class="user-name">{{$user->username}}</td>
    <td class="follow-button">
      @if (auth()->user()->isFollowing($user->id))
      <form action="{{route('unfollow',$user->id)}}" method="post">
        @csrf
        <button type="submit" name="btn-unfollow">フォロー解除</button>
      </form>
      @else

      <form action="{{route('follows',$user->id)}}" method='post'>
        @csrf
       <button type="submit" name="btn-follow">フォローする</button>
      </form>
      @endif
    </td>
  </tr>
  @endforeach
  @endif
</table>


@endsection
