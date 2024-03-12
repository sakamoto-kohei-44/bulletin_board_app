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
}
