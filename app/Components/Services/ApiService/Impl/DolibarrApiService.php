<?php 

namespace App\Components\Services\ApiService\Impl;

use App\Components\Services\ApiService\IDolibarrApiService;  

use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Http;

class DolibarrApiService implements IDolibarrApiService
{   

    public function __construct() 
    {    
    }   

    public function getToken( ) {
        $login = config('services.dolibarr.login');
        $password = config('services.dolibarr.password');
        $reset = config('services.dolibarr.reset');
        $dolibarr_domain = config('services.dolibarr.domain');

        $response = Http::withoutVerifying()->get($dolibarr_domain.'/api/index.php/login', [
            'login' => $login,
            'password' => $password,
            'reset' => $reset,
        ]);
        return $response->json('success.token');
    }
} 