<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EditorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('editors')->insert([
            [
                'username' => 'editor1',
                'password' => Hash::make('editor1'), 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'editor2',
                'password' => Hash::make('editor2'), 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'editor3',
                'password' => Hash::make('editor3'), 
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
