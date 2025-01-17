@extends('layouts.login')

@section('content')
<div class="follow_list">
    <div class="follow_header">
        <h1 class="follow_top">フォローリスト</h1>
        <div class="follow_icon">
        @foreach($follows as $follow)
        <a class="" href="profile/{{$follow->id}}/otherprofile">
            <img src="{{ asset('storage/'.$follow->images) }}" alt="フォローアイコン"></a>
        @endforeach
        </div>
    </div>

    <div class="separator"></div>
    @foreach($posts as $post)
    <div class="follow_post">
        <!--画像の表示　$postから持ってくる-->
        <a class="post-name" href="profile/{{$follow->id}}/otherprofile"><img src="{{ asset('storage/' .$post->user->images) }}" alt="フォローアイコン" class="header-icon"></a>
        <div class="post-content">
            <p class="post-username">{{ $post->user->username }}</p>
            <p class="post-text">{{ $post->post }}</p>
        </div>

        <p class="post-date">{{  $post->created_at->format('Y-m-d H:i')  }}</p>
    </div>
    @endforeach
</div>


@endsection
