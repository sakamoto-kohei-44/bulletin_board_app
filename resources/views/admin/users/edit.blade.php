@extends('layouts.adminlte')

@section('title', 'ユーザー編集')

@section('content_header')
    <h1>ユーザー編集</h1>
@stop

@section('content')
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <!-- 編集フォーム -->
        <button type="submit">更新</button>
    </form>
@stop
