<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverPosition extends Model
{
    use HasFactory;

    protected $table = 'driver_positions';

    protected $fillable = [
        'position_name',
    ];

    public $timestamps = false;
}
