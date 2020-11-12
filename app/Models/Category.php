<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    private static $categories = [
        1 => 'Tech',
        2 => 'Business',
        3 => 'Education',
        4 => 'Sport',
        5 => 'Entertainment',
        6 => 'Lifestyle'
    ];

    public static function getCategories(): array
    {
        return static::$categories;
    }

    public static function getCategoryById(int $id): string
    {
        if (array_key_exists($id, static::$categories)) return static::$categories[$id];

        return '';
    }
}
