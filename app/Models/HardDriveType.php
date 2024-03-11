<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HardDriveType extends Model
{
    protected $table = "hard_drive_types";

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
