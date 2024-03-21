<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // 検索キーワードの取得
        $keyword = $request->input('keyword');

        // ユーザー一覧の取得
        $users = User::query();

        // キーワードが入力されている場合は検索
        if ($keyword) {
            $users->where('name', 'like', '%' . $keyword . '%')
                ->orWhere('email', 'like', '%' . $keyword . '%');
        }

        // ページネーション
        $users = $users->paginate(10); // 10件ずつページネーション

        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $users = User::paginate(10);
        return view('users.edit', compact('user', 'users'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        // ユーザー情報の更新処理
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'ユーザーを削除しました');
    }
}