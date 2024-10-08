<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    use HasFactory;

    // Define the inverse relationship with Taxonomy
    public function taxonomy()
    {
        return $this->belongsTo(Taxonomy::class, 'tax_id'); // 'tax_id' is the foreign key in the terms table
    }
}
