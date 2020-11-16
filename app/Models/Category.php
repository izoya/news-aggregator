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

    public function allWithCount()
    {
        return $this->join('news_categories', 'category_id', '=', $this->table . '.id')
            ->join('news', 'news_id', '=', 'news.id')
            ->where('news.is_published', 1)
            ->selectRaw('categories.*, count(news.id) as count')
            ->groupBy($this->table . '.id')->get();
    }

}
