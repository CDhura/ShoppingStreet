<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;
use Illuminate\Support\Facades\Auth;

class EditorController extends Controller
{
    public function mypage()
    {
        $user = Auth::user(); // ログイン中のユーザー情報を取得
        return view('mypage', compact('user'));
    }
    public function show($id)
    {        
        // 現在のレコードを取得
        $notification = Notice::where('notification_id', $id)->firstOrFail();

        return view('editor.preview', ['notification'=>$notification]);
    }
    public function edit_page()
    {
        $notifications = Notice::all();
        return view('editor.edit', ['notifications'=>$notifications]);
    }       
    public function select_page()
    {
        return view('editor.select', );
    }
}
