@extends('layouts.login')

@section('content')

<div class="add-profile">
  <img src="{{ asset('storage/'.Auth::user()->images) }}" class="profile-icon">






<div class="update">
  @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::open(['url' => '/profile/update','enctype' => "multipart/form-data"]) !!}
    @csrf
    {{Form::hidden('id' ,Auth::user() ->id)}}
    <div class="update-form">
      <div class="update-block">
        <label for="name">ユーザー名</label>
        <input type="text" name="username" value="{{Auth::user()->username}}">
      </div>
      <div class="update-block">
        <label for="mail">メールアドレス</label>
        <input type="email" name="mail" value="{{Auth::user()->mail}}">
      </div>
      <div class="update-block">
        <label for="pass">パスワード</label>
        <input type="password" name="password" value="">
      </div>
      <div class="update-block">
        <label for="pass">パスワード確認</label>
        <input type="password" name="password_confirmation" value="">
      </div>
      <div class="update-block">
        <label for="name">自己紹介</label>
        <input type="text" name="bio" value="{{Auth::user()->bio}}">
      </div>
      <div class="update-block">
        <label for="file-upload">アイコン画像</label>
        <div class="custom-file-input">
            <input type="file" name="images" id="file-upload" class="file-input">
            <span class="file-placeholder">ファイルを選択</span>
        </div>
      </div>
      <input type="submit" class="updatebtn" value="更新">
      {{Form::token()}}
      {!! Form::close() !!}
    </div>
  </div>
</div>



@endsection
