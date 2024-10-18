@extends('layouts.logout')

@section('content')
<head>
    <!-- Bootstrap CDNが読み込まれているか確認 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<div id="clear">
  <div class="first">
    <p>{{ session('username')}}さん</p>
    <p>ようこそ!AtlasSNSへ!</p>
  </div>
  <div class="second">
    <p>ユーザー登録が完了いたしました。</p>
    <p>早速ログインをしてみましょう!</p>
  </div>
  <!-- <p class="btn"><a href="/login">ログイン画面へ</a></p>  -->
  <a href="/login" class="btn btn-danger">ログイン画面へ</a>
</div>

@endsection
