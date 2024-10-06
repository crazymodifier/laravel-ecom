<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

class ProductController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $pageData = $this->prepareViewData([
                'pageName' => 'Products',
                'pageAction' => [
                    'title' => 'Add New',
                    'url' => route('admin.products.create')
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
        $pageData = $this->prepareViewData([
            'pageName' => 'Add Product',
            'pageAction' => [
                'title' => 'Back',
                'url' => route('admin.products')
            ],
            'side_metas' => [
                'categories'=> [
                    'title' => 'Categories',
                    'content' => [1,2,3]
                ]
            ]
        ]);

        return view('admin.single.product', $pageData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'slug' => 'required',
        ]);
        if($validator->passes()){
            $product = new Product();
            $product->title = $request->title;
            $product->slug = $request->slug;
            $product->content = $request->content;
            $product->save();
            session()->flash('success', 'Product created successfuly!');
            return redirect()->route('admin.products');
        }else{
            return redirect()->route('admin.products.create')
                ->withErrors($validator)
                ->withInput($request->all());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pageData = $this->prepareViewData([
            'pageName' => 'Edit Product',
            'pageAction' => [
                'title' => 'Back',
                'url' => route('admin.products')
            ],
            'side_metas' => [
                'categories'=> [
                    'title' => 'Categories',
                    'content' => [1,2,3]
                ]
            ]
        ]);
        return view('admin.single.product',$pageData);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pageData = $this->prepareViewData([
            'pageName' => 'Edit Product',
            'pageAction' => [
                'title' => 'Back',
                'url' => route('admin.products')
            ],
            'side_metas' => [
                'categories'=> [
                    'title' => 'Categories',
                    'content' => [1,2,3]
                ]
            ]
        ]);
        return view('admin.single.product',$pageData);
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
