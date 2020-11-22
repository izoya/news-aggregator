<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Feedback
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $subject
 * @property string $message
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Feedback newModelQuery()
 * @method static Builder|Feedback newQuery()
 * @method static Builder|Feedback query()
 * @method static Builder|Feedback whereCreatedAt($value)
 * @method static Builder|Feedback whereEmail($value)
 * @method static Builder|Feedback whereId($value)
 * @method static Builder|Feedback whereMessage($value)
 * @method static Builder|Feedback whereName($value)
 * @method static Builder|Feedback whereSubject($value)
 * @method static Builder|Feedback whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Feedback extends Model
{
    use HasFactory;
    protected $table = 'feedback';
    protected $fillable = ['name', 'email', 'subject', 'message'];

}
