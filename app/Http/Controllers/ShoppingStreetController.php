<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class ShoppingStreetController extends Controller
{
    private $validStreets = ['hidamari', 'komorebi', 'hoshiakari'];

    private function validateStreet($name)
    {
        if (!in_array($name, $this->validStreets)) {
            abort(404);
        }
    }

    // サイト全体のトップページ
    public function index()
    {
        return view('shopping-street.index', ['streets' => $this->validStreets]);
    }

    // 各商店街のトップページ
    // href="{{ route('shopping-street.show', ['name' => 'hidamari']) }}" などで参照可能. 
    public function show($name)
    {
        $this->validateStreet($name);
        return view("shopping-street.{$name}.index", compact('name'));
    }

    // マップページ
    public function map($name)
    {
        $this->validateStreet($name);
        return view("shopping-street.{$name}.map.index", compact('name'));
    }

    public function mapButcher($name)
    {
        $this->validateStreet($name);
        return view("shopping-street.{$name}.map.butcher", compact('name'));
    }

    public function mapShuttered($name)
    {
        $this->validateStreet($name);
        return view("shopping-street.{$name}.map.shuttered", compact('name'));
    }

    public function mapHamburger($name)
    {
        $this->validateStreet($name);
        return view("shopping-street.{$name}.map.hamburger", compact('name'));
    }


    // お知らせページ
    public function notifications($name)
    {
        $this->validateStreet($name);
        $notifications = Notification::orderBy('created_at', 'desc')->get(); // ここを変える必要あり. （計算量を減らすため. ）
        return view("shopping-street.{$name}.notifications.index", compact('name'), ['notifications'=>$notifications]);
        // return view("shopping-street.{$name}.notifications.index", compact('name'));

    }
    public function notificationsShow($name, $id)
    {
        // $notification = Notification::findOrFail($id);
        
        // 現在のレコードを取得
        $notification = Notification::where('notification_id', $id)->firstOrFail();

        // 1つ前のレコードを取得
        // $prevNotification = Notification::where('notification_id', '<', $id) // $notification_idより小さいカラムnotification_idを持つレコードを取ってくる
        $prevNotification = Notification::where('created_at', '<', $notification->created_at) // $notification->created_atより小さい(つまり時間が前の)カラムcreated_atを持つレコードを取ってくる
        ->orderBy('created_at', 'desc') // desc：降順に並べる
        ->first(); // 最初のレコードを取ってくる

        // 1つ後のレコードを取得
        $nextNotification = Notification::where('created_at', '>', $notification->created_at) 
        ->orderBy('created_at', 'asc') // asc：昇順に並べる
        ->first(); // 最初のレコードを取ってくる 

        return view("shopping-street.{$name}.notifications.show", compact('name'), ['prevNotification'=>$prevNotification, 'notification'=>$notification, 'nextNotification'=>$nextNotification]);

    }

    // アクセス情報ページ
    public function access($name)
    {
        $this->validateStreet($name);
        return view("shopping-street.{$name}.access.index", compact('name'));
    }
}
