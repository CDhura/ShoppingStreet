<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\Notice;

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
        $notifications = Notification::orderBy('created_at', 'desc')->get(); // 計算量を減らすために, ここを変える必要あり. 
        return view("shopping-street.{$name}.notifications.index", compact('name'), ['notifications'=>$notifications]);
        // return view("shopping-street.{$name}.notifications.index", compact('name'));

    }
    public function notices($name)
    {
        $this->validateStreet($name);

        // function($query){..} は無名関数. use($name)により, 関数内で$nameが使えるようになる. 
        // functionにより, 求めるshopping_street_idを出力. 例えば$name == 'hidamari'なら, 1を出力. 
        // $noticesはレコードの配列. 
        $notices = Notice::where('shopping_street_id', function ($query) use ($name) {
            $query->select('id')
                ->from('shopping_streets')
                ->where('slug', $name); // 該当する商店街のお知らせのみを取り出す. 
        })
        ->orderBy('id', 'desc') // idについての降順で表す
        ->paginate(10); // 10件ずつ取得   

        // return view("shopping-street.{$name}.notices.index", compact('name'), ['notices'=>$notices]);  
        return view("shopping-street.notices.index", ['name' => $name, 'notices' => $notices]);
    }
    public function noticesShow($name, $id)
    {    
        // // 現在のお知らせを取得
        // $notice = Notice::where('id', $id)->firstOrFail();
    
        // // 1つ前のお知らせを取得（`created_at` の降順）
        // $prevNotice = Notice::where('id', '<', $notice->id)
        //     ->orderBy('id', 'desc')
        //     ->first();
    
        // // 1つ後のお知らせを取得（`created_at` の昇順）
        // $nextNotice = Notice::where('created_at', '>', $notice->created_at)
        //     ->orderBy('id', 'asc')
        //     ->first();

        $notice = Notice::findOrFail($id);
    
        // 1つ前の記事
        // $prevNotice = $notice->prev_id ? Notice::find($notice->prev_id) : null;
        if($notice->prev_id){
            $prevNotice = Notice::find($notice->prev_id);
        }else{
            $prevNotice = null;
        }
    
        // 1つ後の記事
        // $nextNotice = $notice->next_id ? Notice::find($notice->next_id) : null;
        if($notice->next_id){
            $nextNotice = Notice::find($notice->next_id);
        }else{
            $nextNotice = null;
        }

        // return view("shopping-street.{$name}.notices.show", [
        return view("shopping-street.notices.show", [
            'name' => $name, 
            'prevNotice' => $prevNotice,
            'notice' => $notice,
            'nextNotice' => $nextNotice
        ]);
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
