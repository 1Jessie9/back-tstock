<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RAMOption extends Model
{
    protected $table = 'ram_options';

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
