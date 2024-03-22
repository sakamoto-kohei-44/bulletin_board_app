@extends('layouts.app')

@section('content')
    <h1>投稿を編集</h1>

    <form method="POST" action="{{ route('post.update', ['id' => $post->id]) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">タイトル</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">内容</label>
            <textarea class="form-control" id="body" name="body">{{ $post->body }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">更新する</button>
    </form>
@endsection
