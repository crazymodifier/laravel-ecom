<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use Illuminate\Http\Request;

class ProductController extends BaseController
{
    //

    function show(){

        $pageData = $this->prepareViewData([
            'pageName' => 'Shop',
            'products' => Product::latest()->paginate(12)
        ]);
        return view('shop',$pageData);
    }
}
