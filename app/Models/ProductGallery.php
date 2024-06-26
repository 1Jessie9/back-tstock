<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGallery extends Model
{
    protected $table = 'product_gallery';
    protected $fillable = [
        'product_id',
        'image_path',
        'enabled',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
