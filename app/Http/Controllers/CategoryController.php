<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

use App\Components\Services\ApiService\IDolibarrApiService;

class CategoryController extends Controller
{
    protected IDolibarrApiService $dolibarrApiService;

    public function __construct(IDolibarrApiService $dolibarrApiService)
    {
        $this->dolibarrApiService = $dolibarrApiService;
    }

    //
    public function getCategories()
    {
        // ✅ Call the service method
        $result = $this->dolibarrApiService->getCategories();

        // Return just the token value
        return response()->json($result);
    }

    public function getLatestCategoriesUpdates($hours)
    {
        // ✅ Call the service method
        $result = $this->dolibarrApiService->getLatestCategoriesUpdates($hours);

        // Return just the token value
        return response()->json($result);
    }

}
 