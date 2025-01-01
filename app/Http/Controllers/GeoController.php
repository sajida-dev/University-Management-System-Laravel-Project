<?php

namespace App\Http\Controllers;

use App\Services\GeoService;
use Illuminate\Http\Request;

class GeoController extends Controller
{
    protected $geoService;

    public function __construct(GeoService $geoService)
    {
        $this->geoService = $geoService;
    }

    public function getProvinces(Request $request)
    {
        $countryCode = $request->input('country_code');
        $provinces = $this->geoService->getProvinces($countryCode);

        return response()->json($provinces);
    }

    public function getCities(Request $request)
    {
        $provinceCode = $request->input('province_code');
        $cities = $this->geoService->getCities($provinceCode);

        return response()->json($cities);
    }
}
