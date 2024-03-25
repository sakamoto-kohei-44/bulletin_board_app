<?php

namespace App\Http\Controllers\Admin;;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $title = 'ユーザー一覧'; // タイトルを設定
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

        return view('admin.users.index', compact('users', 'title'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $users = User::paginate(10);
        return view('admin.users.edit', compact('user', 'users'));
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
        return redirect()->route('admin.users.index')->with('success', 'ユーザーを削除しました');
    }
}