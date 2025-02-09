<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editor extends Authenticatable
{
    use HasFactory;

    // モデルの属性やリレーションを定義する
    protected $fillable = [
        'editor_id', 'password',
    ];

    // デフォルトの認証に使用するカラムを指定
    protected $primaryKey = 'editor_id';
    public $incrementing = false;
    protected $keyType = 'string';
}
