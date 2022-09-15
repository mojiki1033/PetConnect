<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Pet;
use App\Http\Requests\CommentRequest;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(CommentRequest $request, Comment $comment, Pet $pet)
    {
        $input = $request->all();    //リクエストパラメータを取得
        $input['user_id'] = Auth::id();    //現在認証しているユーザーのIDをuser_idとして追加
        $input['pet_id'] = $pet->id;    //ルートパラメータから取得したレコードのidをpet_idとして追加
        $comment->fill($input)->save();    //commentsテーブルに保存
        return redirect('/pets/' . $pet->id);
    }
}
