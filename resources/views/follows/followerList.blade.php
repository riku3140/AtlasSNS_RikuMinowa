@extends('layouts.login')

@section('content')

<div class="container">
    <h1>フォロワーリスト</h1>
    <div class="follow_icon">
        @foreach($followed as $followed)
        <a><img src="{{ asset('storage/'.$followed->images) }}" alt="フォローアイコン"></a>
        @endforeach
        @foreach($posts as $post)
        <a><img src="{{ asset('storage/'.$followed->images) }}" alt="フォローアイコン"></a>
    <p>名前:{{ $post->user->username }}</p>
    <p>投稿内容:{{ $post->post }}</p>
    <p>{{  $post->created_at  }}</p>
    @endforeach
    </div>
</div>
@endsection
