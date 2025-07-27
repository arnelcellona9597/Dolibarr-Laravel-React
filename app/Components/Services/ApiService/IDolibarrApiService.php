<?php 

namespace App\Components\Services\ApiService;

interface IDolibarrApiService
{
    public function getToken();
    public function getProducts();
    public function getCategories();
    public function getLatestProductsUpdates($hours);
    public function getLatestCategoriesUpdates($hours);
} 