<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('notices')->insert([
        //     [
        //         'shopping_street_id' => 1,
        //         'title' => '夏祭り開催のお知らせ',
        //         'body' => '今年も夏祭りを開催します！ぜひお越しください。',
        //         'prev_id' => null,  
        //         'next_id' => 2,     
        //         'created_at' => now()->subDays(3),
        //         'updated_at' => now()->subDays(3),
        //     ],
        //     [
        //         'shopping_street_id' => 1,
        //         'title' => '営業時間変更のお知らせ',
        //         'body' => '一部店舗の営業時間が変更になります。',
        //         'prev_id' => 1,     // 前の記事のID
        //         'next_id' => 3,     // 次の記事のID
        //         'created_at' => now()->subDays(2),
        //         'updated_at' => now()->subDays(2),
        //     ],
        //     [
        //         'shopping_street_id' => 1,
        //         'title' => '新しいお店がオープンしました！',
        //         'body' => '新店舗がオープンしましたので、ぜひご来店ください。',
        //         'prev_id' => 2,     
        //         'next_id' => null,  
        //         'created_at' => now()->subDay(),
        //         'updated_at' => now()->subDay(),
        //     ],

        //     // 新宿ゴールデン街 (shopping_street_id = 2)
        //     [
        //         'shopping_street_id' => 2,
        //         'title' => '秋祭りが開催されました！',
        //         'body' => '秋祭りがついに開催されました！爽やかな秋風の中、たくさんの方々にお越しいただき、心温まる楽しいひとときを過ごすことができました。',
        //         'prev_id' => null,
        //         'next_id' => 5,
        //         'created_at' => now()->subDays(3),
        //         'updated_at' => now()->subDays(3),
        //     ],
        //     [
        //         'shopping_street_id' => 2,
        //         'title' => '店舗改装のお知らせ',
        //         'body' => '一部店舗の改装工事を行います。',
        //         'prev_id' => 4,
        //         'next_id' => 6,
        //         'created_at' => now()->subDays(2),
        //         'updated_at' => now()->subDays(2),
        //     ],
        //     [
        //         'shopping_street_id' => 2,
        //         'title' => '七夕祭りが開催されました！',
        //         'body' => '待ちに待った七夕祭りが開催されました！',
        //         'prev_id' => 5,
        //         'next_id' => null,
        //         'created_at' => now()->subDay(),
        //         'updated_at' => now()->subDay(),
        //     ]
        // ]);

        
        // 商店街ごとのお知らせデータ. 
        // prev_idとnext_idは後で設定する. （そうしないと矛盾が生じる. ）
        $noticesData = [
            1 => [ // shopping_street_id == 1 
                ['title' => '夏祭り開催のお知らせ', 'body' => '今年も夏祭りを開催します！ぜひお越しください。'],
                ['title' => '営業時間変更のお知らせ', 'body' => '一部店舗の営業時間が変更になります。'],
                ['title' => '新しいお店がオープンしました！', 'body' => '新店舗がオープンしましたので、ぜひご来店ください。']
            ],
            2 => [ // shopping_street_id == 2 
                ['title' => '秋祭りが開催されました！', 'body' => '秋祭りがついに開催されました！'],
                ['title' => '店舗改装のお知らせ', 'body' => '一部店舗の改装工事を行います。'],
                ['title' => '七夕祭りが開催されました！', 'body' => '待ちに待った七夕祭りが開催されました！']
            ]
        ];

        // `prev_id` と `next_id` を後で設定するためにIDを保存する. 
        $insertedIds = [];

        // $shoppingStreetId：キー（1, 2）のこと. $noticesは[]内. 
        foreach ($noticesData as $shoppingStreetId => $notices) {
            $prevId = null;

            foreach ($notices as $index => $notice) {
                // データを挿入して, IDを取得する. 
                $noticeId = DB::table('notices')->insertGetId([
                    'shopping_street_id' => $shoppingStreetId,
                    'title' => $notice['title'],
                    'body' => $notice['body'],
                    'prev_id' => null, // 後で設定. 
                    'next_id' => null, // 後で設定. 
                    'created_at' => now()->subDays(count($notices) - $index),
                    'updated_at' => now()->subDays(count($notices) - $index),
                ]);

                // `prev_id` の更新
                if ($prevId) {
                    DB::table('notices')->where('id', $prevId)->update(['next_id' => $noticeId]);
                    DB::table('notices')->where('id', $noticeId)->update(['prev_id' => $prevId]);
                }

                // `prevId` を現在の ID に更新
                $prevId = $noticeId;
                $insertedIds[$shoppingStreetId][] = $noticeId;
            }
        }
    }
}
