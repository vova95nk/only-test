<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PositionCar extends Model
{
    use HasFactory;

    protected $table = 'position_cars';

    protected $fillable = [
        'position_id',
        'category_id',
    ];

    public $timestamps = false;
}
