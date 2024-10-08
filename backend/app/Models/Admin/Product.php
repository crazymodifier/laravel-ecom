<?php

namespace App\Models\Admin;

use App\Models\Term;
use App\Models\TermRelationships;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    public function terms($taxonomy=null){
        
        // $query = $this->hasMany(TermRelationships::class, 'product_id');
        $query = $this->belongsToMany(Term::class, 'term_relationships', 'product_id', 'term_id');
        if($taxonomy !== null){
            $query->where('tax_slug', $taxonomy)->orwhere('tax_id', $taxonomy);
        }
        
        return $query;
    }
    // Define the relationship with TermRelationship
    public function termRelationships()
    {
        return $this->hasMany(TermRelationships::class, 'product_id'); // Correct relationship
    }
}
