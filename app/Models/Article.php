<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable=[

        'title',
        'summary',
        'body',
        'views_count',
        'user_id',
        'category_id',
        'image',
        'status',

    ];


    public function users(){

        return $this->belongsTo(User::class,'user_id');

    }

    public function categories(){

        return $this->belongsTo(Category::class,'category_id');

    }
}
