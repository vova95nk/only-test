<?php

declare(strict_types=1);

namespace App\Http\Actions;

use App\Http\Requests\CustomRequest;
use App\Repositories\CarsRepository;
use Illuminate\Http\Resources\Json\JsonResource;

class AvailableCarList
{
    public function __construct(protected CarsRepository $carsRepository)
    {
    }

    public function __invoke(CustomRequest $request): JsonResource
    {
        $page = (int) $request->get('page', 1);
        $perPage = (int) $request->get('per-page', 25);

        $availableCars = $this->carsRepository->getAvailableDriverCarList($page, $perPage, $request);

        return JsonResource::collection($availableCars);
    }
}
