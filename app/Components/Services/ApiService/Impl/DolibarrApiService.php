<?php 

namespace App\Components\Services\ApiService\Impl;

use App\Components\Services\ApiService\IDolibarrApiService;  

use Illuminate\Support\Facades\Http;

class DolibarrApiService implements IDolibarrApiService
{
    protected $login;
    protected $password;
    protected $reset;
    protected $domain;
    protected $accept;

    public function __construct()
    {
        // Store config values as properties for reuse
        $this->login   = config('services.dolibarr.login');
        $this->password = config('services.dolibarr.password');
        $this->reset    = config('services.dolibarr.reset');
        $this->domain   = config('services.dolibarr.domain');
        $this->accept   = config('services.dolibarr.accept');
    }

    public function getToken()
    {
        $response = Http::withoutVerifying()->get($this->domain . '/api/index.php/login', [
            'login' => $this->login,
            'password' => $this->password,
            'reset' => $this->reset,
        ]);

        return $response->json('success.token');
    }

    public function getProducts()
    {
        $token = $this->getToken();

        $response = Http::withoutVerifying()
            ->withHeaders([
                'DOLAPIKEY' => $token,
                'Accept' => $this->accept,
            ])
            ->get($this->domain . '/api/index.php/products');

        return $response->json();
    }

    public function getCategories()
    {
        $token = $this->getToken();

        $response = Http::withoutVerifying()
            ->withHeaders([
                'DOLAPIKEY' => $token,
                'Accept' => $this->accept,
            ])
            ->get($this->domain . '/api/index.php/categories');

        return $response->json();
    }


    public function getLatestProductsUpdates($hours)
    {
        $token = $this->getToken();
    
        // Calculate Unix timestamp for N hours ago
        $timestamp = strtotime("-$hours hour");
    
        // Build the sqlfilters string properly
        $filter = '(t.tms:>:' . date('Y-m-d H:i:s', $timestamp) . ')';
    
        $response = Http::withoutVerifying()
            ->withHeaders([
                'DOLAPIKEY' => $token,
                'Accept' => $this->accept,
            ])
            ->get($this->domain . '/api/index.php/products', [
                'sqlfilters' => $filter, // <-- Use the variable here
                'sortfield' => 't.tms',
                'sortorder' => 'DESC',
            ]);


        return $response->json();
    }


    public function getLatestCategoriesUpdates($hours)
    {
        $token = $this->getToken();
    
        // Calculate Unix timestamp for N hours ago
        $timestamp = strtotime("-$hours hour");
    
        // Build the sqlfilters string properly
        $filter = '(t.tms:>:' . date('Y-m-d H:i:s', $timestamp) . ')';
    
        $response = Http::withoutVerifying()
            ->withHeaders([
                'DOLAPIKEY' => $token,
                'Accept' => $this->accept,
            ])
            ->get($this->domain . '/api/index.php/categories', [
                'sqlfilters' => $filter, // <-- Use the variable here
                'sortfield' => 't.tms',
                'sortorder' => 'DESC',
            ]);


        return $response->json();
    }
    

}
