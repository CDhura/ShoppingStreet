<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Editor;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class EditorsController extends Controller
{
    public function show($id){        
        // 現在のレコードを取得
        $notification = Notification::where('notification_id', $id)->firstOrFail();

        return view('editor.preview', ['notification'=>$notification]);
    }
    public function edit_page(){
        $notifications = Notification::all();
        return view('editor.edit', ['notifications'=>$notifications]);
    }       
    public function select_page(){
        return view('editor.select', );
    }
}
