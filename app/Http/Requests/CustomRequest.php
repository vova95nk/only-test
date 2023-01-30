<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Models\Driver;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property array|null $filter  Массив с фильтрами
 * @property string $dateFrom
 * @property string $dateTo
 * @property int|null $page    Страница
 */
class CustomRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'driver_id' => 'required|int',
            'date_from' => 'required|date',
            'date_to' => 'required|date',
            'filter' => 'array',
            'page' => 'integer',
            'per-page' => 'integer',
            'sort' => 'string',
        ];
    }

    public function messages(): array
    {
        return [
            'driver_id.required' => 'Не передано обязательный параметр driver_id',
            'driver_id.int' => 'Передано некорректное значение для ключа driver_id',
            'filter.array' => 'Передано некорректное значение для ключа filter',
            'page.integer' => 'Передано некорректное значение для ключа page',
            'per-page.integer' => 'Передано некорректное значение для ключа per-page',
            'sort.string' => 'Передано некорректное значение для ключа sort',
        ];
    }

    /**
     * @return Driver|null
     */
    public function getDriver(): ?Model
    {
        return Driver::query()->find($this->validated('driver_id'));
    }

    public function getDateFrom(): Carbon
    {
        return Carbon::make($this->validated('date_from'));
    }

    public function getDateTo(): Carbon
    {
        return Carbon::make($this->validated('date_to'));
    }
}
