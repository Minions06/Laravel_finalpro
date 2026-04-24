<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    // ADMIN DASHBOARD

    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    // CREATE FORM
    
    public function create()
    {
        return view('admin.products.create');
    }

   
    // STORE PRODUCT
   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|string',
            'where_to_buy' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif'
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = strtolower($image->getClientOriginalExtension());

            $allowed = ['jpg','jpeg','png','webp','gif'];

            if (!in_array($extension, $allowed)) {
                return back()->with('error', 'Invalid image format');
            }

            $imageName = uniqid().'_'.time().'.'.$extension;
            $image->move(public_path('images'), $imageName);
        }

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'where_to_buy' => $request->where_to_buy,
            'image' => $imageName
        ]);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product added successfully!');
    }

    // =========================
    // EDIT FORM
    // =========================
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    // =========================
    // UPDATE PRODUCT
    // =========================
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'where_to_buy' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif'
        ]);

        $imageName = $product->image;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = strtolower($image->getClientOriginalExtension());

            $allowed = ['jpg','jpeg','png','webp','gif'];

            if (!in_array($extension, $allowed)) {
                return back()->with('error', 'Invalid image format');
            }

            $imageName = uniqid().'_'.time().'.'.$extension;
            $image->move(public_path('images'), $imageName);
        }

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'where_to_buy' => $request->where_to_buy,
            'image' => $imageName
        ]);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated successfully!');
    }

    // =========================
    // DELETE PRODUCT
    // =========================
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product deleted successfully!');
    }
}