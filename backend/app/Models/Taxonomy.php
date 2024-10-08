<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taxonomy extends Model
{
    use HasFactory;

    // Define the relationship with Terms
    public function terms()
    {
        return $this->hasMany(Term::class, 'tax_id'); // 'tax_id' is the foreign key in the terms table
    }
}
