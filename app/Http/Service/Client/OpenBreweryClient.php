<?php

namespace App\Http\Service\Client;

use App\Interfaces\BreweryRepositoryInterface;
use Illuminate\Support\Facades\Http;

class OpenBreweryClient
{
   public function __construct()
   {
   }

   public function get($url, $parameters = [])
   {
      $fullUrl = env('OPEN_BREWERY_HOST') . $url;
      $response = Http::get($fullUrl, $parameters);
      return $response->json();
   }
}
