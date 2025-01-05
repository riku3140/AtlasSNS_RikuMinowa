@extends('layouts.login')

@section('content')
<div class="container">
  {!! Form::open(['url' => '/top']) !!}
  {{ Form::token() }}
  <div class="form-group">
    <div class="input-container">
      <img src="{{ asset('storage/images/' . Auth::user()->images) }}" alt="ユーザーアイコン" class="icon-image">
      {{ Form::textarea('text', null, ['required', 'class' => 'form-control','placeholder' => '投稿内容を入力してください']) }}
      <button type="submit" class="post-btn"><img src="images/post.png" alt="送信" class="post-icon"></button>
    </div>
  </div>
  {!! Form::close() !!}
</div>
<div class="separator"></div>
<div>
  @foreach($list as $list)
  <ul class="post-item">
    <li class="post-name"><img src="{{ asset('storage/'.$list->user->images) }}" alt="ユーザーアイコン"></li>
    <div class="post-content">
      <li class="post-username">{{ $list->user->username }}</li>
      <li class="post-text">{{ $list->post }}</li>
    </div>
    <div class="post-actions">
      <li class="post-date">{{ $list->created_at->format('Y-m-d H:i') }}</li>
      @if(Auth::id() == $list->user_id)
      <li class="action-buttons">
        <a class="edit-btn js-modal-open" href="" post="{{ $list->post }}" post_id="{{ $list->id }}">編集</a>
        <a class="delete-button js-delete-btn" href="/post/{{$list->id}}/delete">削除</a>
        <div class="custom-confirm-modal js-confirm-modal">
          <div class="modal-content">
            <p>この投稿を削除します。よろしいでしょうか？</p>
            <div class="modal-buttons">
              <button class="confirm-ok">OK</button>
              <button class="confirm-cancel">キャンセル</button>
            </div>
          </div>
        </div>
      </li>
      @endif
    </div>
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
                <button type="submit" class="update-button">
                  <img src="../images/edit.png" alt="更新" class="update-icon">
                </button>
                {{ csrf_field() }}
           </form>
           <a class="js-modal-close" href="">閉じる</a>
        </div>
    </div>





@endsection
