@extends('layouts.login')

@section('content')
<div class="container">
    <h1>フォローリスト</h1>
    <div class="follow_icon">
        @foreach($follows as $follow)
        <a><img src="{{ asset('public/storage'.$follow->images) }}" alt="フォローアイコン"></a>
        <!-- 投稿日時も記載 -->
        @foreach($posts as $post)
    <p>名前:{{ $post->user->username }}</p>
    <p>投稿内容:{{ $post->post }}</p>
        @endforeach
        @endforeach
    </div>
</div>


@endsection
