<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'type',
        'status'
    ];

    public function menuitem(): MorphMany
    {
        return $this->morphMany(MenuItem::class, 'linkable');
    }

}
