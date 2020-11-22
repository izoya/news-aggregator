<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Order
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property int $phone
 * @property string $request
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Order newModelQuery()
 * @method static Builder|Order newQuery()
 * @method static Builder|Order query()
 * @method static Builder|Order whereCreatedAt($value)
 * @method static Builder|Order whereEmail($value)
 * @method static Builder|Order whereId($value)
 * @method static Builder|Order whereName($value)
 * @method static Builder|Order wherePhone($value)
 * @method static Builder|Order whereRequest($value)
 * @method static Builder|Order whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = ['name', 'email', 'phone', 'request'];
}
