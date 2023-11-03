<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_category_id',
        'title',
        'quantity',
        'images',
        'price',
        'description',
        'sold_quantity',
        'youtube_link',
        'video'
    ];

    public function parentCategroy(): HasOne
    {
        return $this->hasOne(ParentCategory::class, 'parent_categoy_id', 'id');
    }
}
