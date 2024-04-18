<?php

namespace App\Http\Service\Adapter;

use App\Http\Service\Client\OpenBreweryClient;
use App\Interfaces\BreweryRepositoryInterface;
use App\Models\Brewery;
use Illuminate\Support\Collection;

class OpenBreweryAdapter
{
   public function __construct(
      private OpenBreweryClient $openBreweryClient
   ) {
   }

   public function getBrewery(string $id): Brewery
   {
      $brewery = $this->openBreweryClient->get("/breweries/$id");
      return $this->createBreweryFromResponse($brewery);
   }

   public function getBrewersList($parameters = null): Collection
   {
      $breweryList = $this->openBreweryClient->get("/breweries", $parameters);
      $entities = [];
      foreach ($breweryList as $brewery) {
         $breweryEntity = $this->createBreweryFromResponse($brewery);
         array_push($entities, $breweryEntity);
      }
      return collect($entities);
   }

   public function getTotalCount($parameters = null): int
   {
      $breweryMetadata = $this->openBreweryClient->get("/breweries/meta", $parameters);
      return  $breweryMetadata['total'];
   }

   public function createBreweryFromResponse($object): Brewery
   {
      return new Brewery(
         $object["id"],
         $object["name"] ?? null,
         $object["brewery_type"] ?? null,
         $object["address_1"] ?? null,
         $object["address_2"] ?? null,
         $object["address_3"] ?? null,
         $object["city"] ?? null,
         $object["state_province"] ?? null,
         $object["postal_code"] ?? null,
         $object["country"] ?? null,
         $object["longitude"] ?? null,
         $object["latitude"] ?? null,
         $object["phone"] ?? null,
         $object["website_url"] ?? null,
         $object["state"] ?? null,
         $object["street"] ?? null
      );
   }
}
