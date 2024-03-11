<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HardDriveSize extends Model
{
    protected $table = "hard_drive_sizes";

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
