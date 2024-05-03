@extends('layouts.login')

@section('content')

<form action="/search" method="post">
  @csrf
  <input type="text" name="keyword" class="form" placeholder="検索">
  <button type="submit" class="btn btn-success">検索</button>
</form>
@if (!empty($keyword))
<p>検索ワード : {{ $keyword}}</p>
@endif

@foreach($users as $user)
<ul>
  <li><img src="{{asset('images/'.$user->images)}}" alt="ユーザーアイコン"></li>
  <li>{{ $user -> username }}</li>
</ul>
@if(isset($user)and!(Auth::user()==$user)and(isset($keyword)))
@endif


<form action="{{ route('follows.follow')}}" method='post'>
  @csrf
<input type="hidden" name="user_id" value="{{ $user->username }}">
<button type="submit" class="btn btn-primary">
@if ($user ->isfollowed)
フォロー解除
@endif

<form action="{{ route('follows.follow')}}" method='post'>
  @csrf
<input type="hidden" name="user_id" value="{{ $user->username }}">
<button type="submit" class="btn btn-primary">
@if ($user ->isfollowing)
フォローする
@endif
</button>
</form>
@endforeach


@endsection
