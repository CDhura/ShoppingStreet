<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $primaryKey = 'notification_id'; // ここでプライマリキーを設定. 
    protected $fillable = ['title','body']; // これらの属性以外を変更（厳密にはMass Assignment）できないようにしている. 
}
