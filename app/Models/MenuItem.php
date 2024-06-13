<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class MenuItem extends Model implements Sortable
{
    use HasFactory;
    use SortableTrait;





    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];

    const models = [
        Category::class=>'دسته بندی'

    ];

    protected $fillable=[
        'title',
        'linkable_type',
        'linkable_id',
        'link',
        'new_tab',
        'menu_group_id',
        'status'

    ];

    public function linkable(): MorphTo
    {
        return $this->morphTo();
    }
}




