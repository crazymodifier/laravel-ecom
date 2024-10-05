<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Term;
use Illuminate\Http\Request;

class TaxonomyController extends Controller
{
    //

    function index(Request $request){
        $type = $request->query('type');
        if($type){
            $terms = Term::latest()->paginate(10);
            // dd($terms);
            $data  = [
                'type' => $type,
                'terms' => $terms
            ];
            return view('admin.single.taxonomy', $data);
        }
        return view('admin.taxonomies');
    }
}
