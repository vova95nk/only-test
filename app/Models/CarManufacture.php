<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string $name
 */
class CarManufacture extends Model
{
    use HasFactory;

    protected $table = 'car_manufactures';

    protected $fillable = [
        'name',
    ];

    public $timestamps = false;

    public function models(): HasMany
    {
        return $this->hasMany(CarModel::class, 'manufacture_id', 'id');
    }
}
