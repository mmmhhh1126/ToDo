<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Folder;

class HomeController extends Controller
{
    //
    public function index()
    {
        // ログインユーザーを取得する
        $folder_db = new Folder;
        $user = Auth::user();


        // ログインユーザーに紐づくフォルダを一つ取得する
        $folder = $folder_db->where('user_id', $user['id'])->first();

        // まだ一つもフォルダを作っていなければホームページをレスポンスする
        if (is_null($folder)) {
            return view('home');
        }

        // フォルダがあればそのフォルダのタスク一覧にリダイレクトする
        return redirect()->route('tasks.index', [
            'folder' => $folder->id,
        ]);
    }
}