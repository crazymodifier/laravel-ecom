<?php

namespace App\Http\Controllers\Admin;

use App\Models\Taxonomy;
use App\Models\Term;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class TaxonomyController extends BaseController
{
    //

    function index(Request $request){

        $pageData = $this->prepareViewData([
            'pageName' => 'Taxonomies'
        ]);
        return view('admin.taxonomies' , $pageData);
    }

    function show(string $type){
        
        $pageData = $this->prepareViewData([
            'pageName' => ucfirst($type)
        ]);

        $term = Taxonomy::where('slug', $type)->first();
        $pageData['tax_data'] = $term;
        return view('admin.single.taxonomy' ,$pageData );
    }
}
