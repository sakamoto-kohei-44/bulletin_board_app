@extends('layouts.adminlte')

@section('title', 'ユーザー一覧')

@section('content_header')
    <h1>ユーザー一覧</h1>
@stop

@section('content')
    <form action="{{ route('users.index') }}" method="GET">
        <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="検索キーワード">
        <button type="submit">検索</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>名前</th>
                <th>Email</th>
                <th>アクション</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('users.show', $user->id) }}">詳細</a>
                        <a href="{{ route('users.edit', $user->id) }}">編集</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">削除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $users->links() }} <!-- ページネーションリンク -->
@stop
