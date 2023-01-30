<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Http\Requests\CustomRequest;
use App\Models\Car;
use App\Models\Driver;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Mockery\Exception;

class CarsRepository
{
    public function getAvailableDriverCarList(int $page, int $perPage, CustomRequest $request): LengthAwarePaginator
    {
        /** @var Driver $driver */
        $driver = $request->getDriver();

        if (is_null($driver)) {
            throw new Exception('Водитель не найден');
        }

        $carsBuilder = $this->getAvailableCarByDriver($driver);

        $filter = $request->filter;

        $carsBuilder = $this->checkFilters($carsBuilder, $filter);

        $carsBuilder = $this->checkTimeAvailable($carsBuilder, $request);

        return $carsBuilder->paginate($perPage, ['*'], 'page', $page);
    }

    protected function checkFilters(Builder $builder, array $filter): Builder
    {
        if (isset($filter['manufacture_ids'])) {
            $builder->whereIn('manufacture_id', $filter['manufacture_ids']);
        }

        if (isset($filter['model_ids'])) {
            $builder->whereIn('model_id', $filter['model_ids']);
        }

        if (isset($filter['category_id'])) {
            $builder->whereIn('category_id', $filter['category_ids']);
        }

        return $builder;
    }

    protected function checkTimeAvailable(Builder $query, CustomRequest $request): Builder
    {
        $dateFrom = $request->getDateFrom();
        $dateTo = $request->getDateTo();

        $query->leftJoin('driver_cars', 'driver_cars.car_id', '=', 'cars.id')
            ->whereNull('driver_cars.id')
            ->orWhere('driver_cars.date_from', '<', $dateTo->toDateTimeString())
            ->where('driver_cars.date_to', '<', $dateFrom->toDateTimeString());

        return $query;
    }

    protected function getAvailableCarByDriver(Driver $driver): Builder
    {
        $availableCarCategoryIds = $driver->categories()->pluck('category_id')->toArray();

        return Car::query()->where('is_locked', false)->whereIn('category_id', $availableCarCategoryIds);
    }
}
