<?php

namespace App\Models;

use App\Models\Admin\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TermRelationships extends Model
{
    use HasFactory;

    function product(){
        return $this->belongsToMany(Product::class);
    }
}
