@extends('layouts.app')

@section('content')
    <h1>投稿一覧</h1>
    <table>
        <thead>
            <tr>
                <th>タイトル</th>
                <th>内容</th>
                <th>作成日</th>
                <th>編集</th>
                <th>削除</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->body }}</td>
                    <td>{{ $post->created_at->format('Y-m-d') }}</td>
                    <td><a href="{{ route('post.edit', ['id' => $post->id]) }}" class="btn btn-info">編集</a></td>
                    <td>
                        <form action="{{ route('post.destroy', ['id'=>$post->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">削除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
