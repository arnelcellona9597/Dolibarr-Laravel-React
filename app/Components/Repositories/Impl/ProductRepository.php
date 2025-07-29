<?php

namespace App\Components\Repositories\Impl;

use App\Components\Repositories\IProductRepository;

use App\Models\Product;

use Illuminate\Support\Facades\Log;
 
class ProductRepository implements IProductRepository
{
    public function importProduct ( $data ) {
        Product::create($data);
    }
}
