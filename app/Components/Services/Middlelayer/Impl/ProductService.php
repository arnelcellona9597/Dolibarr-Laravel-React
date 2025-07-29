<?php 

namespace App\Components\Services\Middlelayer\Impl;

use App\Components\Services\Middlelayer\IProductService;  

use App\Components\Services\ApiService\IDolibarrApiService;  

use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Log;

use App\Models\Product;  

class ProductService implements IProductService
{
 
    protected IDolibarrApiService $apiService;

    public function __construct(IDolibarrApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function importProducts()
    {
        $products = $this->apiService->getProducts(); // array of all products

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['dolibarr_product_id' => $product['id']], // ← check for existing record
                [
                    'wc_product_id'       => null,  
                    'data'                => json_encode($product),
                    'data_is_synched'     => 0,
                    'has_image'           => 0,
                    'image_is_synched'    => 0,
                ]
            );
        }
    }

}
