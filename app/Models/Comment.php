<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    // コメントを作成したユーザー
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // このコメントが属している投稿
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
