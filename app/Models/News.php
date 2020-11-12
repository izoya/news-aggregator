<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    private static $newsList = [
        1 => [
            'slug' => 'one',
            'category_id' => 1,
            'title' => 'First news',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus adipisci aliquam asperiores commodi consequuntur corporis culpa cumque error iste iure modi natus, non officiis quaerat quo ratione rem',
        ],
        2 => [
            'slug' => 'two',
            'category_id' => 1,
            'title' => 'Second news',
            'description' => 'Lorem ipsum dolor sit amet, aliquam asperiores commodi consequuntur corporis culpa cumque error iste iure modi natus, non officiis quaerat quo ratione rem',
        ],
        3 => [
            'slug' => 'three',
            'category_id' => 1,
            'title' => 'Third news',
            'description' => 'Lorem consectetur adipisicing elit. Accusamus adipisci aliquam asperiores commodi consequuntur corporis culpa cumque error iste iure modi natus, non officiis quaerat quo ratione rem',
        ],
        4 => [
            'slug' => 'four',
            'category_id' => 1,
            'title' => 'Forth news',
            'description' => 'Lorem consectetur adipisicing elit. Accusamus adipisci aliquam asperiores commodi consequuntur corporis culpa cumque error iste iure modi natus, non officiis quaerat quo ratione rem',
        ],
        5 => [
            'slug' => 'five',
            'category_id' => 2,
            'title' => 'Commodi 2-5',
            'description' => 'Lorem consectetur adipisicing elit. Accusamus adipisci aliquam asperiores commodi consequuntur corporis culpa cumque error iste iure modi natus, non officiis quaerat quo ratione rem',
        ],
        6 => [
            'slug' => 'six',
            'category_id' => 2,
            'title' => 'Commodi 2-6',
            'description' => 'Lorem consectetur adipisicing elit. Accusamus adipisci aliquam asperiores commodi consequuntur corporis culpa cumque error iste iure modi natus, non officiis quaerat quo ratione rem',
        ],
        7 => [
            'slug' => 'seven',
            'category_id' => 2,
            'title' => 'Commodi 2-7',
            'description' => 'Lorem consectetur adipisicing elit. Accusamus adipisci aliquam asperiores commodi consequuntur corporis culpa cumque error iste iure modi natus, non officiis quaerat quo ratione rem',
        ],
        8 => [
            'slug' => 'eight',
            'category_id' => 2,
            'title' => 'Commodi 2-8',
            'description' => 'Lorem consectetur adipisicing elit. Accusamus adipisci aliquam asperiores commodi consequuntur corporis culpa cumque error iste iure modi natus, non officiis quaerat quo ratione rem',
        ],
        9 => [
            'slug' => 'nine',
            'category_id' => 3,
            'title' => 'Accusamus 3-9',
            'description' => 'Lorem consectetur adipisicing elit. Accusamus adipisci aliquam asperiores commodi consequuntur corporis culpa cumque error iste iure modi natus, non officiis quaerat quo ratione rem',
        ],
        10 => [
            'slug' => 'ten',
            'category_id' => 3,
            'title' => 'Accusamus 3-10',
            'description' => 'Lorem consectetur adipisicing elit. Accusamus adipisci aliquam asperiores commodi consequuntur corporis culpa cumque error iste iure modi natus, non officiis quaerat quo ratione rem',
        ],
        11 => [
            'slug' => 'eleven',
            'category_id' => 3,
            'title' => 'Accusamus 3-11',
            'description' => 'Lorem consectetur adipisicing elit. Accusamus adipisci aliquam asperiores commodi consequuntur corporis culpa cumque error iste iure modi natus, non officiis quaerat quo ratione rem',
        ],
        12 => [
            'slug' => 'twelve',
            'category_id' => 3,
            'title' => 'Accusamus 3-12',
            'description' => 'Lorem consectetur adipisicing elit. Accusamus adipisci aliquam asperiores commodi consequuntur corporis culpa cumque error iste iure modi natus, non officiis quaerat quo ratione rem',
        ],
        13 => [
            'slug' => 'thirteen',
            'category_id' => 4,
            'title' => 'Lorem 4-13',
            'description' => 'Lorem consectetur adipisicing elit. Accusamus adipisci aliquam asperiores commodi consequuntur corporis culpa cumque error iste iure modi natus, non officiis quaerat quo ratione rem',
        ],
        14 => [
            'slug' => 'fourteen',
            'category_id' => 4,
            'title' => 'Lorem 4-14',
            'description' => 'Lorem consectetur adipisicing elit. Accusamus adipisci aliquam asperiores commodi consequuntur corporis culpa cumque error iste iure modi natus, non officiis quaerat quo ratione rem',
        ],
        15 => [
            'slug' => 'fifteen',
            'category_id' => 4,
            'title' => 'Lorem 4-15',
            'description' => 'Lorem consectetur adipisicing elit. Accusamus adipisci aliquam asperiores commodi consequuntur corporis culpa cumque error iste iure modi natus, non officiis quaerat quo ratione rem',
        ],
        16 => [
            'slug' => 'sixteen',
            'category_id' => 4,
            'title' => 'Lorem 4-16',
            'description' => 'Lorem consectetur adipisicing elit. Accusamus adipisci aliquam asperiores commodi consequuntur corporis culpa cumque error iste iure modi natus, non officiis quaerat quo ratione rem',
        ],
        17 => [
            'slug' => 'seventeen',
            'category_id' => 5,
            'title' => 'News 5-17',
            'description' => 'Lorem consectetur adipisicing elit. Accusamus adipisci aliquam asperiores commodi consequuntur corporis culpa cumque error iste iure modi natus, non officiis quaerat quo ratione rem',
        ],
        18 => [
            'slug' => 'eighteen',
            'category_id' => 5,
            'title' => 'News 5-18',
            'description' => 'Lorem consectetur adipisicing elit. Accusamus adipisci aliquam asperiores commodi consequuntur corporis culpa cumque error iste iure modi natus, non officiis quaerat quo ratione rem',
        ],
        19 => [
            'slug' => 'nineteen',
            'category_id' => 5,
            'title' => 'Lorem consectetur 5-19',
            'description' => 'Lorem consectetur adipisicing elit. Accusamus adipisci aliquam asperiores commodi consequuntur corporis culpa cumque error iste iure modi natus, non officiis quaerat quo ratione rem',
        ],
        20 => [
            'slug' => 'twenty',
            'category_id' => 5,
            'title' => 'Lorem consectetur 5-20',
            'description' => 'Lorem consectetur adipisicing elit. Accusamus adipisci aliquam asperiores commodi consequuntur corporis culpa cumque error iste iure modi natus, non officiis quaerat quo ratione rem',
        ],
    ];

    public static function getNews(): array
    {
        return static::$newsList;
    }

    public static function getNewsById(int $id): array
    {
        if (array_key_exists($id, static::$newsList)) return static::$newsList[$id];

        return [];
    }

    public static function getNewsBySlug(string $slug): array
    {
        foreach (static::$newsList as $news) {

            if ($news['slug'] == $slug) return  $news;
        }

        return [];
    }

    public static function getNewsByCategory(int $catId): array
    {
        $newsList = [];

        foreach (static::$newsList as $id=>$news) {

            if ($news['category_id'] == $catId) $newsList[$id] = $news;
        }

        return $newsList;
    }


}
