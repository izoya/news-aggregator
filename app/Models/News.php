<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\News
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string|null $image
 * @property string $description
 * @property string $content
 * @property int $is_published
 * @property int $source_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Source $source
 * @method static Builder|News newModelQuery()
 * @method static Builder|News newQuery()
 * @method static Builder|News query()
 * @method static Builder|News whereContent($value)
 * @method static Builder|News whereCreatedAt($value)
 * @method static Builder|News whereDescription($value)
 * @method static Builder|News whereId($value)
 * @method static Builder|News whereImage($value)
 * @method static Builder|News whereIsPublished($value)
 * @method static Builder|News whereSlug($value)
 * @method static Builder|News whereSourceId($value)
 * @method static Builder|News whereTitle($value)
 * @method static Builder|News whereUpdatedAt($value)
 * @mixin Eloquent
 * @property string|null $link
 * @property-read Collection|Category[] $categories
 * @property-read int|null $categories_count
 * @method static Builder|News whereLink($value)
 */
class News extends Model
{
    use HasFactory;

    protected $table = 'news';
    protected $fillable = ['title', 'slug', 'image', 'description', 'content', 'source_id'];

    public function source()
    {
        return $this->belongsTo(Source::class, 'source_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'news_categories');
    }

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'is_published' => 'boolean',
    ];
}
