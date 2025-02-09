<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Editor extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['username', 'password', 'shopping_street_id'];

    public function shoppingStreet()
    {
        return $this->belongsTo(ShoppingStreet::class);
    }
}
