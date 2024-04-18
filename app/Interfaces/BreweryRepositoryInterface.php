<?php

namespace App\Interfaces;

use App\Models\Brewery;
use Illuminate\Support\Collection;

interface BreweryRepositoryInterface
{
    public function index($parameters = null): Collection;
    public function getById($id): Brewery;
    public function count($parameters = null): int;
}
