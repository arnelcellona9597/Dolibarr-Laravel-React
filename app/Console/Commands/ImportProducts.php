<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Components\Services\Middlelayer\IProductService;

use Illuminate\Support\Facades\Log;

class ImportProducts extends Command
{

    protected $signature = 'dolibarr:import-products';
    protected $description = 'Get the products data from Dolibarr and import to Laravel database';

    protected IProductService $productService;

    // Constructor-based dependency injection
    public function __construct(IProductService $productService)
    {
        parent::__construct();
        $this->productService = $productService;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Log::info("START: dolibarr:import-products");
        $this->productService->importProducts();
        Log::info("END: dolibarr:import-products");
    }
}
