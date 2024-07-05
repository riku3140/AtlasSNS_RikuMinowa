@extends('layouts.login')

@section('content')
<div class="container">
  {!! Form::open(['url' => '/top']) !!}
  {{Form::token()}}
  <div class="form-group">
  {{ Form::textarea('text', null, ['required', 'class' => 'form-control','placeholder' => '投稿内容'])}}
  </div>
  <button type="submit" class="post-btn"><img src="images/post.png" alt="送信" class="post-icon"></button>
  {!! Form::close() !!}
</div>

<div>
  @foreach($list as $list)
  <ul>
    <li><img src="{{asset('storage/'.$list->user->images)}}" alt="ユーザーアイコン"></li>
    <li>{{ $list -> user-> username }}</li>
    <li>{{ $list ->post }}</li>
    <li>{{ $list ->created_at }}</li>
    <li><a class="js-modal-open edit-btn" href="" post="{{ $list->post }}" post_id="{{ $list->id }}">編集</a></li>
    <li><a class="delete-button" href="/post/{{$list->id}}/delete" onclick="return confirm('この投稿を削除しますか？')">削除</a></li>
  </ul>
  @endforeach
</div>
<!-- 投稿の編集はここから下 -->

<div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
           <form action="/post/update" method="post">
                <textarea name="uppost" class="modal_post"></textarea>
                <input type="hidden" name="id" class="modal_id" value="">
                <input type="submit" value="更新">
                {{ csrf_field() }}
           </form>
           <a class="js-modal-close" href="">閉じる</a>
        </div>
    </div>





@endsection
