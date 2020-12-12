<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Source
 *
 * @property int $id
 * @property string $name
 * @property string|null $link
 * @property string|null $description
 * @method static Builder|Source newModelQuery()
 * @method static Builder|Source newQuery()
 * @method static Builder|Source query()
 * @method static Builder|Source whereDescription($value)
 * @method static Builder|Source whereId($value)
 * @method static Builder|Source whereLink($value)
 * @method static Builder|Source whereName($value)
 * @mixin Eloquent
 * @property-read Collection|News[] $news
 * @property-read int|null $news_count
 * @property string|null $image
 * @method static Builder|Source whereImage($value)
 */
class Source extends Model
{
    use HasFactory;
    protected $table = 'sources';
    protected $fillable = ['name', 'link', 'description', 'image'];
    public $timestamps = false;


    public function news(): HasMany
    {
        return $this->hasMany(News::class);
    }

    public function withNewsCount()
    {
        return $this->withCount('news');
    }
}
