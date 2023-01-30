<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\DriversFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int|null $position_id
 * @property string $name
 */
class Driver extends Model
{
    use HasFactory;

    protected $table = 'drivers';

    protected $fillable = [
        'name',
        'permission_id',
    ];

    public $timestamps = false;

    protected static function newFactory(): DriversFactory
    {
        return new DriversFactory();
    }

    public function categories(): HasMany
    {
        return $this->hasMany(PositionCar::class, 'position_id','position_id');
    }
}
