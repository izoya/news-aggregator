<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use stdClass;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    public function getNews(): Collection
    {
        return DB::table($this->table)->get();
    }

    public function getNewsById(int $id): stdClass
    {
        return DB::table($this->table)->find($id);
    }

    public function getNewsBySlug(string $slug): stdClass
    {
        return DB::table($this->table)->where('slug', $slug)->first();
    }

    public function getNewsByCategory(int $catId): Collection
    {
        return DB::table($this->table)
            ->join('news_categories', 'news_id', '=', 'id')
            ->where('category_id', $catId)
            ->select($this->table . '.*')
            ->get();
    }
}
