@extends('layouts.app')

@section('content')
<div class="container">
    <h1>新規投稿</h1>

    <!-- バリデーションエラーの表示 -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- フォーム -->
    <form action="{{ route('post.store') }}" method="POST">
        @csrf <!-- CSRF トークン -->
        <div class="form-group">
            <label for="title">タイトル:</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="form-group">
            <label for="body">本文:</label>
            <textarea class="form-control" id="body" name="body" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">投稿</button>
        </div>
    </form>
</div>
@endsection
