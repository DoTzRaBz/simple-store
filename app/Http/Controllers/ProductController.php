<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(5);
        return view('Products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nama' => 'required|string|max:100',
            'description' => 'nullable|string|max:255',
            'retail_price' => 'required|numeric|min:1|max:999999',
            'wholesale_price' => 'required|numeric|min:1|max:999999|lte:retail_price',
            'min_wholesale_qty' => 'required|integer|min:10|lte:quantity',
            'quantity' => 'required|integer|min:0',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $productData = $request->all();


        if ($request->hasFile('photo')) {
            $file = $request->file('photo');

            $filename = time() . '_' . $file->getClientOriginalName();

            $path = $file->storeAs('public/products', $filename);

            $productData['photo'] = $path;
        }


        Product::create($productData);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }



    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('Products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('Products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {

        $request->validate([
            'Nama' => 'required|string|max:100',
            'description' => 'nullable|string|max:255',
            'retail_price' => 'required|numeric|min:1|max:999999',
            'wholesale_price' => 'required|numeric|min:1|max:999999|lte:retail_price',
            'min_wholesale_qty' => 'required|integer|min:10|lte:quantity',
            'quantity' => 'required|integer|min:0',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $product->Nama = $request->input('Nama');
        $product->description = $request->input('description');
        $product->retail_price = $request->input('retail_price');
        $product->wholesale_price = $request->input('wholesale_price');
        $product->min_wholesale_qty = $request->input('min_wholesale_qty');
        $product->quantity = $request->input('quantity');


        if ($request->hasFile('photo')) {
            $file = $request->file('photo');

            $filename = time() . '_' . $file->getClientOriginalName();

            $path = $file->storeAs('public/products', $filename);

            $product->photo = $path;
        }


        $product->save();


        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
