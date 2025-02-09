<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\ShoppingStreet;

class Notice extends Model
{
    use HasFactory;

    // protected $fillable = ['title','body']; // これらの属性以外を変更（厳密にはMass Assignment）できないようにしている. 

    protected $fillable = [
        'shopping_street_id',
        'title',
        'body',
        'prev_id',
        'next_id'
    ];

    // 商店街とのリレーション
    public function shoppingStreet()
    {
        return $this->belongsTo(ShoppingStreet::class);
    }
}
