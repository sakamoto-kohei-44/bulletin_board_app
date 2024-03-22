<?php

namespace App\Http\Controllers;
use App\Models\post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('user_id', \Auth::user()->id)->get();
        return view('post.index', compact('posts'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        // モデルのインスタンス生成
        //バリデーション
        $validatedData = $request->validate([
            'title' => 'required|max:20',
            'body' => 'required|max:255',
        ]);

        $post = new Post;
        $post->title = $validatedData['title'];
        $post->body = $validatedData['body'];
        $post->user_id = \Auth::id();
        $post->save();
        return redirect()->route('post.index')->with('success', '投稿が保存されました。');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('post.edit', compact('post'));
    }

    public function update(Request $request, $id)  // Request は、HTTP リクエストの情報を取得するためのクラスで引数を受け取る
    {
        // バリデーション処理
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        $post = Post::find($id);  // 対象の投稿を取得
        // 投稿の情報を更新
        $post->title = $validatedData['title'];
        $post->body = $validatedData['body'];
        $post->save();  // 保存
        // リダイレクト処理
        return redirect()->route('post.index')->with('success', '投稿が編集されました');
    }
}
