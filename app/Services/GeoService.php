<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GeoService
{
    protected $baseUri;
    protected $username;

    public function __construct()
    {
        $this->baseUri = config('services.geonames.base_uri');
        $this->username = config('services.geonames.username');
    }

    public function getCountries()
    {
        $response = Http::get("{$this->baseUri}countryInfoJSON", [
            'username' => $this->username,
        ]);

        return $response->json();
    }

    public function getProvinces($countryCode)
    {
        $response = Http::get("{$this->baseUri}admin1CodesJSON", [
            'username' => $this->username,
            'country' => $countryCode,
        ]);

        return $response->json();
    }

    public function getCities($provinceCode)
    {
        $response = Http::get("{$this->baseUri}searchJSON", [
            'username' => $this->username,
            'adminCode1' => $provinceCode,
            'featureClass' => 'P', // P for populated places
        ]);

        return $response->json();
    }
}
