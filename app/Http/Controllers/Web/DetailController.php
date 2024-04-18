<?php

namespace App\Http\Controllers\Web;

use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Http\Service\BreweryService;
use App\Models\User;

class DetailController extends Controller
{
    public function __construct(
        private BreweryService $breweryService
    ) {
    }
    
    public function show(string $id)
    {
        $brewery = $this->breweryService->getBrewery($id);
        return view('detail', ['brewery' => $brewery]);
    }


}
