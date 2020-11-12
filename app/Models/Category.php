<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    public function news(): BelongsToMany
    {
        return $this->belongsToMany(News::class, 'news_categories', 'category_id', 'news_id');
    }
}