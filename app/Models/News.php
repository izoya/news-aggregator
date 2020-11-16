<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';
    protected $fillable = ['title', 'slug', 'image', 'description', 'content', 'source_id'];

    public function source()
    {
        return $this->belongsTo(Source::class, 'source_id');
    }

}
