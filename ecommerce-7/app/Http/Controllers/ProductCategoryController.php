<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productCategories = ProductCategory::withCount('products')
                                ->withSum('products as total_stock', 'stock')
                                ->get();
        return view('admin.product-category.index', compact('productCategories'));
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
        $request->validate([
            'name' => 'required|string|max:100|unique:product_categories,name',
            // 'slug' => 'required|string|max:100|unique:product_categories,slug',
        ]);

        $slug = strtolower(str_replace(' ', '-', $request->name));

        ProductCategory::create([
            'name' => $request->name,
            'slug' => $slug,
        ]);

        // $category = new ProductCategory();
        // $category->name = $request->name;
        // $category->slug = $request->slug;
        // $category->save();

        return redirect()
                // ->route('product-categories.index')
                ->back()
                ->with('success', 'Kategori Produk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductCategory $productCategory)
    {
        // $request->validate([
        //     'name' => 'required|string|max:100|unique:product_categories,name,'.$productCategory->id,
        //     'slug' => 'required|string|max:100|unique:product_categories,slug,'.$productCategory->id,
        // ]);

        // $productCategory->update([
        //     'name' => $request->name,
        //     'slug' => $request->slug,
        // ]);

        // return redirect()
        //     ->back()
        //     ->with('success', 'Kategori berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCategory $productCategory)
    {
        $productCategory->delete();

        return redirect()->route('product-categories.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
