<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ShoppingStreetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('shopping_streets')->insert([
            [
                'name' => '陽だまり商店街',
                'slug' => 'hidamari',
                'description' =>    '地元民に愛されて早半世紀
                                    歴史の町〇〇に根差した昔ながらの商店街',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '木もれび商店街',
                'slug' => 'komorebi',
                'description' =>    '〇〇市に位置する賑やかで親しみやすいエリアです。
                                    地元の食材や日用品が揃う店舗が並び、地域密着型の温かい雰囲気が特徴。
                                    レトロな魅力とともに、観光やショッピングにぴったりのスポットです。',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '星あかり商店街',
                'slug' => 'hoshiakari',
                'description' =>    '〇〇の風情を今に伝える、温かみあふれる商店街。
                                    昔ながらの魅力と新しい活気が交わる、街の憩いの場',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}

