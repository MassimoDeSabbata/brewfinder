<?php

namespace App\Repositories;

use App\Http\Service\Adapter\OpenBreweryAdapter;
use App\Interfaces\BreweryRepositoryInterface;
use App\Models\Brewery;
use Illuminate\Support\Collection;
use Ramsey\Uuid\Type\Integer;

class BreweryHttpRepository implements BreweryRepositoryInterface
{
    
    /**
     * Create a new class instance.
     */
    public function __construct(
        private OpenBreweryAdapter $openBreweryAdapter
    )
    {
        //
    }

    public function index($parameters = null): Collection
    {
        return $this->openBreweryAdapter->getBrewersList($parameters);
    }

    public function getById($id): Brewery
    {
        return $this->openBreweryAdapter->getBrewery($id);
    }

    public function count($parameters = null): int
    {
        $count = $this->openBreweryAdapter->getTotalCount($parameters);
        return $count;
    }
}
