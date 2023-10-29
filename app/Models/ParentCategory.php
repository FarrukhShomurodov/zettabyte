<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ParentCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "image"
    ];

    public function category(): HasMany
    {
        return $this->hasMany(Category::class, "parent_category_id", "id");
    }
}
