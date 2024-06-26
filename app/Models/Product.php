<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "product";
    protected $fillable = [
        'brand_id',
        'hard_drive_type_id',
        'hard_drive_size_id',
        'ram_id',
        'title',
        'description',
        'price',
        'enabled',
        'specifications',
    ];

    protected $casts = [
        'specifications' => 'array',
    ];

    protected $attributes = [
        'specifications' => '[]',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function ramOption()
    {
        return $this->belongsTo(RAMOption::class, 'ram_id');
    }

    public function hardDriveType()
    {
        return $this->belongsTo(HardDriveType::class, 'hard_drive_type_id');
    }

    public function hardDriveSize()
    {
        return $this->belongsTo(HardDriveSize::class, 'hard_drive_size_id');
    }

    public function gallery()
    {
        return $this->hasMany(ProductGallery::class);
    }

    public function additionalInfo()
    {
        return $this->hasMany(ProductAdditionalInfo::class);
    }

    public function shoppingCarts()
    {
        return $this->hasMany(ShoppingCart::class);
    }

    public function getSpecificationsAttribute($value)
    {
        return json_decode($value, true);
    }
}
