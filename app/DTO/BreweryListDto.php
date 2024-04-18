<?php

namespace App\DTO;

use Illuminate\Support\Collection;
use Ramsey\Uuid\Type\Integer;

class BreweryListDto
{
    public Collection $breweries;
    public ?int $total = null;
    public ?string $page = null;
    public ?string $per_page = null;
    public ?int $totalPages = null;

    public function __construct(
        Collection $breweries,
        int $total = null,
        string $page = null,
        string $per_page = null,
        ?int $totalPages = null
    ) {
        $this->breweries = $breweries;
        $this->total = $total;
        $this->page = $page;
        $this->per_page = $per_page;
        $this->totalPages = $totalPages;
    }
}
