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

if(isset($users))
<table>
  @foreach($users as $users)
  <tr>
    <td><img src="{{asset('images/'.$user->images)}}" alt="ユーザーアイコン"></td>
    <td>{{$user->username}}</td>
    <td>
      @if ($user->id !== Auth::user()->id)
      <form action="{{route('unfollow',$user->id)}}" method="post">
        @csrf
        <button type="button" class="btn btn-danger">フォロー解除</button>
      </form>
      @else

      <form action="{{route('follow',$user->id)}}" method='post'>
        @csrf
        <button type="button" class="btn btn-primary">フォローする</button>
      </form>
      @endif
    </td>
  </tr>
  @endforeach
</table>

@endforeach


@endsection
