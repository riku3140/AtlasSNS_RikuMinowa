@extends('layouts.login')

@section('content')

<div class="container">
    <h1>フォロワーリスト</h1>
    <div class="follow_icon">
        @foreach($followed as $followed)
        <a><img src="{{ asset('storage/'.$followed->images) }}" alt="フォローアイコン"></a>
        @foreach($posts as $post)
    <p>名前:{{ $post->user->username }}</p>
    <p>投稿内容:{{ $post->post }}</p>
    <p>{{  $post->created_at  }}</p>
        @endforeach
        @endforeach
    </div>
</div>
@endsection
