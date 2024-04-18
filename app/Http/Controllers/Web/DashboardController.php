<?php

namespace App\Http\Controllers\Web;

use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Http\Service\BreweryService;
use App\Models\User;

class DashboardController extends Controller
{
    public function __construct(
        private BreweryService $breweryService
    ) {
    }
    
    public function show()
    {
        $request = request();
        $parameters = $request->all();

        $breweriesListDto = $this->breweryService->getBrewersListPaginated($parameters);
        return view('dashboard', ['breweries' => $breweriesListDto]);
    }


}
