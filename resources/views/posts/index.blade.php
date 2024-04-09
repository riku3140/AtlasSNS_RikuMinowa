@extends('layouts.login')

@section('content')
<div class="container">
  <h2>機能を実装していきましょう。</h2>
  {!! Form::open(['url' => 'posts/index']) !!}
  {{Form::token()}}
  <div class="form-group">
  {!! Form::textarea('text','newpost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容']) !!}
  </div>
  <button type="submit" class="btn btn-success pull-right"><img src="images/post.png" alt="送信"></button>
  {!! Form::close() !!}
</div>

<div>
  @foreach($list as $list)
  <tr>
    <td>{{ $list ->user_id }}</td>
    <td>{{ $list ->post }}</td>
    <td>{{ $list ->create_at }}</td>
  </tr>
  @endforeach
</div>



@endsection
