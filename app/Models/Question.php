<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $values)
 */
class Question extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = [
        "meta" => "array"
    ];

}
