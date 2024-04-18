<?php

namespace App\Models;


class Brewery
{
    public string $id;
    public ?string $name;
    public ?string $brewery_type;
    public ?string $address_1;
    public ?string $address_2;
    public ?string $address_3;
    public ?string $city;
    public ?string $state_province;
    public ?string $postal_code;
    public ?string $country;
    public ?string $longitude;
    public ?string $latitude;
    public ?string $phone;
    public ?string $website_url;
    public ?string $state;
    public ?string $street;

    public function __construct(
        $id,
        $name = null,
        $brewery_type = null,
        $address_1 = null,
        $address_2 = null,
        $address_3 = null,
        $city = null,
        $state_province = null,
        $postal_code = null,
        $country = null,
        $longitude = null,
        $latitude = null,
        $phone = null,
        $website_url = null,
        $state = null,
        $street = null
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->brewery_type = $brewery_type;
        $this->address_1 = $address_1;
        $this->address_2 = $address_2;
        $this->address_3 = $address_3;
        $this->city = $city;
        $this->state_province = $state_province;
        $this->postal_code = $postal_code;
        $this->country = $country;
        $this->longitude = $longitude;
        $this->latitude = $latitude;
        $this->phone = $phone;
        $this->website_url = $website_url;
        $this->state = $state;
        $this->street = $street;
    }
}
