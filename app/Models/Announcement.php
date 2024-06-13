<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;
    protected $fillable=[

        'title',
        'summary',
        'body',
        'published_at',
        'views_count',
        'user_id',
        'image',
        'status',
    ];


    public function users(){

        return $this->belongsTo(User::class,'user_id');

    }
}

