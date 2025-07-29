<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'wc_product_id',
        'dolibarr_product_id',
        'data',
        'data_is_synched',
        'has_image',
        'image_is_synched',
        'created_at',
        'updated_at',
    ];

}
