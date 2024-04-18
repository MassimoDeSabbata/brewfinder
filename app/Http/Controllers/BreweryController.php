<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Http\Resources\BreweryListResource;
use App\Http\Resources\BreweryResource;
use App\Http\Service\BreweryService;
use Exception;

class BreweryController extends Controller
{

    public function __construct(
        private BreweryService $breweryService
    ) {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $request = request();
            $parameters = $request->all();

            $breweriesListDto = $this->breweryService->getBrewersListPaginated($parameters);
        } catch (Exception $e) {
            return ApiResponseClass::sendErrorResponse($e);
        }

        return ApiResponseClass::sendSuccessResponse(new BreweryListResource($breweriesListDto));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $breweryId)
    {
        try {
            $data = $this->breweryService->getBrewery($breweryId);
        } catch (Exception $e) {
            return ApiResponseClass::sendErrorResponse($e);
        }

        return ApiResponseClass::sendSuccessResponse(new BreweryResource($data));
    }

   
}
