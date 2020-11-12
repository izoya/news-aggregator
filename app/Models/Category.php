<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use stdClass;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    public function getCategories(): Collection
    {
        return DB::table($this->table)->get();
    }

    public function getCategoryById(int $id): stdClass
    {
        return DB::table($this->table)->find($id);
    }
}
