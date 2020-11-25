<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string|null $description
 * @property-read Collection|News[] $news
 * @property-read int|null $news_count
 * @method static Builder|Category newModelQuery()
 * @method static Builder|Category newQuery()
 * @method static Builder|Category query()
 * @method static Builder|Category whereDescription($value)
 * @method static Builder|Category whereId($value)
 * @method static Builder|Category whereSlug($value)
 * @method static Builder|Category whereTitle($value)
 * @mixin Eloquent
 */
class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    public $timestamps = false;
    protected $fillable = ['title', 'slug', 'description'];

    public function news(): BelongsToMany
    {
        return $this->belongsToMany(News::class, 'news_categories');
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
