@extends('layouts.adminlte')

@section('title', 'ユーザー詳細')

@section('content_header')
    <h1>ユーザー詳細</h1>
@stop

@section('content')
    <p>ID: {{ $user->id }}</p>
    <p>名前: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>
    <!-- その他のユーザー情報を表示 -->
@stop
