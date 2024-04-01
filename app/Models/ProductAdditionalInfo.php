<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAdditionalInfo extends Model
{
    protected $table = 'product_additional_info_product';
    protected $fillable = [
        'product_id',
        'title',
        'description',
        'image_path',
        'features',
        'enabled',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
