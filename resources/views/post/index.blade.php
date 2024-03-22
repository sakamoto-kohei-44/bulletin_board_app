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
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->body }}</td>
                    <td>{{ $post->created_at->format('Y-m-d') }}</td>
                    <td><a href="{{ route('post.edit', ['id' => $post->id]) }}" class="btn btn-info">編集</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
