@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
<div class="login">
  {!! Form::open(['url' => '/login']) !!}

<h1>AtlasSNSへようこそ</h1>

{{ Form::label('メールアドレス') }}
{{ Form::text('mail',null,['class' => 'input']) }}
{{ Form::label('パスワード') }}
{{ Form::password('password',['class' => 'input']) }}

{{ Form::submit('ログイン') }}

<p><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}

</div>
@endsection
