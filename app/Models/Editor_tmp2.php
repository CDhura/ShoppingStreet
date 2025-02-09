<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Editor extends Authenticatable
{
    use Notifiable;

    protected $table = 'editors'; // editors テーブルを使用する. （usersテーブルは使用しない）
    protected $fillable = ['username', 'password', 'shopping_street_id'];
    
    public function shoppingStreet()
    {
        return $this->belongsTo(ShoppingStreet::class);
    }

    protected $hidden = ['password'];

    protected $casts = [
        'password' => 'hashed',
    ];
}
