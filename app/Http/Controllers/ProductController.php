<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.product.index', [
            "products" => Product::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.product.create', [
            "categories" => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        $validatedData = $request->validate([
            'name' => 'required|string|min:3|max:50',
            'description' => 'nullable|string|min:5',
            'stock' => 'required|integer|not_in:0',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'category_id' => 'required|integer|exists:categories,id',
        ]);

        $name_image_path = $request->file('image')->store('product-images', 'public');
        $validatedData['image'] = $name_image_path;

        // dd($validatedData);
        Product::create($validatedData);

        return redirect('/dashboard/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('dashboard.product.show', [
            "product" => $product,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        // dd("masuk fun edit");
        return view('dashboard.product.edit', [
            'product' => $product,
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $validatedData = $request->validate([
            'name' => 'required|string|min:3|max:50',
            'description' => 'nullable|string|min:5',
            'stock' => 'required|integer|not_in:0',
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            'old_image' => 'required|exists:products,image',
            'category_id' => 'required|integer|exists:categories,id',
        ]);

        if ($request->file('image')) {
            // File::delete('storage/' . $validatedData['old_image']);
            if ($validatedData['old_image'] != "product-images/dummy-image.png") {
                File::delete('storage/' . $validatedData['old_image']);
            }
            $name_image_path = $request->file('image')->store('product-images', 'public');
            $validatedData['image'] = $name_image_path;
        } else {
            $validatedData['image'] = $validatedData['old_image'];
        }
        $findProduct = Product::find($id);

        $findProduct->update($validatedData);

        return redirect('dashboard/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->image != "product-images/dummy-image.png") {
            File::delete('storage/' . $product->image);
        }
        Product::destroy($product->id);
        return redirect('dashboard/product');
    }
}
