<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.product.index')
            ->with('products', Product::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.product.create')
            ->with('categories', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image',
            'price' => 'required',
            'category' => 'required',
        ]);

        $product = new Product();

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->title = $request->title;
        $product->category_id = $request->category;
        $product->quantity = $request->quantity;

        $image = $request->image;

        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('product', $imagename);
            $product->image = $imagename;
        }

        $product->save();
        // toastr()->timeOut(3000)->success('Product Added Successfully!');
        // return redirect()->back();

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('backend.product.edit')
            ->with('product', $product)
            ->with('categories', Category::all());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image',
            'price' => 'required',
            'category' => 'required',
            'quantity' => 'required',
        ]);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category;
        $product->quantity = $request->quantity;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('product'), $imagename);
            $product->image = $imagename;
        }

        $product->save();
        toastr()->timeOut(3000)->success('Product Updated Successfully!');

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $image_path = public_path('product/' . $product->image);
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        $product->delete();
        toastr()->timeOut(3000)->success('Product Deleted Successfully!');

        return redirect()->back();
    }

    public function product_search(Request $request)
    {
        $search = $request->search;

        $products = Product::where('title', 'LIKE', '%' . $search . '%')->orwhere('category_id', 'LIKE', '%' . $search . '%')->paginate(3);

        return view('backend.product.index')
            ->with('products', $products);
    }
}
