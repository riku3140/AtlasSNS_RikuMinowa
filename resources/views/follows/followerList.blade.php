@extends('layouts.login')

@section('content')

<div class="follow_list">
    <div class="follow_header">
        <h1 class="follow_top">フォロワーリスト</h1>
        <div class="follow-icon">
            @foreach($followed as $followed)
            <a class="" href="profile/{{$followed->id}}/otherprofile">
                <img src="{{ asset('storage/'.$followed->images) }}" alt="フォローアイコン"></a>
                @endforeach
        </div>
    </div>
    <div class="separator"></div>
    @foreach($posts as $post)
    <div class="follow_post">
        <a class="post-name" href="profile/{{$followed->id}}/otherprofile"><img src="{{ asset('storage/' .$post->user->images) }}" alt="フォローアイコン"></a>
        <div class="post-content">
            <p class="post-username">{{ $post->user->username }}</p>
            <p class="post-text">{{ $post->post }}</p>
        </div>
        <p class="post-date">{{  $post->created_at->format('Y-m-d H:i')  }}</p>
    </div>
    @endforeach
</div>
@endsection
