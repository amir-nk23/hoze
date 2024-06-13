<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable=[
        'featured',
        'title',
        'subtitle',
        'summary',
        'body',
        'published_at',
        'views_count',
        'user_id',
        'category_id',
        'image',
        'status',

    ];

    public function tags (){

        return $this->belongsToMany(Tag::class,'news_tag');

    }

    public function attachTags(array $tags): array{

        $tagIds=[];

        foreach ($tags as $tag){

            $tag =Tag::firstOrCreate([
                'title'=>$tag
            ]);
            $tagIds[]=$tag->id;
        }



        return $tagIds;

    }

    public function users(){

        return $this->belongsTo(User::class,'user_id');

    }

    public function categories(){

        return $this->belongsTo(Category::class,'category_id');

    }
}
