<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

use App\Components\Services\ApiService\IDolibarrApiService;

class ProductController extends Controller
{
    protected IDolibarrApiService $dolibarrApiService;

    public function __construct(IDolibarrApiService $dolibarrApiService)
    {
        $this->dolibarrApiService = $dolibarrApiService;
    }

    //
    public function getProducts()
    {
        // ✅ Call the service method
        $result = $this->dolibarrApiService->getProducts();

        // Return just the token value
        return response()->json($result);
    }

    public function getLatestProductsUpdates($hours)
    {
        // ✅ Call the service method
        $result = $this->dolibarrApiService->getLatestProductsUpdates($hours);

        // Return just the token value
        return response()->json($result);
    }
    
}