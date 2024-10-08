<?php

namespace App\Http\Controllers\Public;

use App\Models\Admin\Product;
use Illuminate\Http\Request;

class ShopController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pageData = $this->prepareViewData([
            'pageName' => 'Shop',
            'products' => Product::latest()->paginate(9)
        ]);
        return view('shop',$pageData)->with('paginationView', 'components.public.pagination');;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $item = Product::where('slug', $slug)->first();
        //
        $pageData = $this->prepareViewData([
            'pageName' => 'Shop',
            'item' => $item
        ]);
        return view('single',$pageData);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    function cart(){
        $pageData = $this->prepareViewData([
            'pageName' => 'Cart',
            // 'item' => $item
        ]);
        return view('public.cart',$pageData);
    }
}
