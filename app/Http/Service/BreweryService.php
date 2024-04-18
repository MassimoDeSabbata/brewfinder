<?php

namespace App\Http\Service;

use App\DTO\BreweryListDto;
use App\DTO\BreweryListNavigationDto;
use App\Interfaces\BreweryRepositoryInterface;
use App\Models\Brewery;
use Illuminate\Support\Collection;

class BreweryService
{
    public function __construct(
        private BreweryRepositoryInterface $breweryRepository
    ) {
    }

    public function getBrewery(string $id): Brewery
    {
        $brewery = $this->breweryRepository->getById($id);
        return $brewery;
    }

    public function getBrewersList($parameters = null): Collection
    {
        $breweryList = $this->breweryRepository->index($parameters);
        return $breweryList;
    }

    public function getBrewersListPaginated($parameters = null): BreweryListDto
    {
        if (!array_key_exists('page', $parameters)) {
            $parameters['page'] = env('PAGINATION_DEFAULT_PAGE');
        }
        if (!array_key_exists('per_page', $parameters)) {
            $parameters['per_page'] = env('PAGINATION_DEFAULT_PER_PAGE');
        }

        $breweryList = $this->getBrewersList($parameters);
        $breweryTotal = $this->breweryRepository->count($parameters);
        $pageSize = $parameters['per_page'] ?? null;
        $pageSizeInt = (Integer)($pageSize);
        $totalPages = ceil($breweryTotal / $pageSizeInt);
        
         $paginatedDto = new BreweryListDto(
            $breweryList,
            $breweryTotal,
            $parameters['page'] ?? null,
            $parameters['per_page'] ?? null,
            $totalPages
        );
        return $paginatedDto;
    }

}
