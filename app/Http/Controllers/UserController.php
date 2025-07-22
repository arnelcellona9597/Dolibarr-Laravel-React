<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

use App\Components\Services\ApiService\IDolibarrApiService;

class UserController extends Controller
{
    protected IDolibarrApiService $dolibarrApiService;

    public function __construct(IDolibarrApiService $dolibarrApiService)
    {
        $this->dolibarrApiService = $dolibarrApiService;
    }

    //
    public function getToken()
    {
        // ✅ Call the service method
        $token = $this->dolibarrApiService->getToken();

        // Return just the token value
        return response()->json($token);
    }
}
