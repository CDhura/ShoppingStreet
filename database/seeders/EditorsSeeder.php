<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Hash;

class EditorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('editors')->insert([
            [
                'editor_id' => 'editor1',
                'password' => '1234',
            ],
            [
                'editor_id' => 'editor2',
                'password' => '5678',
            ],
            [
                'editor_id' => 'editor3',
                'password' => '9000',
            ],
            [
                'editor_id' => 'editor4',
                'password' => '8990',
            ],
        ]);
    }
}
