@extends('layouts.login')

@section('content')

<div class="follower_list">
    <h1>フォロワーリスト</h1>
    <div class="follow_icon">
        @foreach($followed as $followed)
        <a class="" href="profile/{{$followed->id}}/otherprofile">
            <img src="{{ asset('storage/'.$followed->images) }}" alt="フォローアイコン"></a>
        @endforeach
        <div class="separator"></div>
        @foreach($posts as $post)
        <a><img src="{{ asset('storage/'.$followed->images) }}" alt="フォローアイコン"></a>
    <p>名前:{{ $post->user->username }}</p>
    <p>投稿内容:{{ $post->post }}</p>
    <p>{{  $post->created_at  }}</p>
    @endforeach
    </div>
</div>
@endsection
