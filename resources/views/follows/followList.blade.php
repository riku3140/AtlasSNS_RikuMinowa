@extends('layouts.login')

@section('content')
<div class="container">
    <h1>フォローリスト</h1>
    <div class="follow_icon">
        @foreach($follows as $follow)
        <a class="" href="profile/{{$follow->id}}/otherprofile">
            <img src="{{ asset('storage/'.$follow->images) }}" alt="フォローアイコン"></a>
        @endforeach
        <div class="separator"></div>
        <!-- 投稿日時も記載 -->
        @foreach($posts as $post)
        <!--画像の表示　$postから持ってくる-->
    <a><img src="{{ asset('storage/' .$post->user->images) }}" alt="フォローアイコン"></a>
    <p>名前:{{ $post->user->username }}</p>
    <p>投稿内容:{{ $post->post }}</p>
    <p>{{  $post->created_at  }}</p>
        @endforeach
    </div>
</div>


@endsection
