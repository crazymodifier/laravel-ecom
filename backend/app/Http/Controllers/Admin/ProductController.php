<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ProductController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->query('action')){
            
            $pageData = $this->prepareViewData([
                'pageName' => 'Add Product',

            ]);
            return view('admin.single.product', $pageData);
        }
        $pageData = $this->prepareViewData([
                'pageName' => 'Products',
                'pageAction' => [
                    'title' => 'Add New',
                    'url' => route('admin.products' , ['action' => 'new'])
                ]
        ]);
        //
        return view('admin.products', $pageData);
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
    public function show(string $id)
    {
        $pageData = $this->prepareViewData([]);
        return view('admin.single.product',$pageData);
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
}
