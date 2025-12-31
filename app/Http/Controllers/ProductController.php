<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index() {
        $products = DB::table('products')->get(); 
        return view('products.index', compact('products'));
    }

    public function create() {
        return view('products.create');
    }

    public function store(Request $request) {
        DB::table('products')->insert([
            'product_id' => $request->product_id,
            'name' => $request->name,
            'category' => $request->category,
            'price' => $request->price,
            'available_stock' => $request->available_stock,
            'status' => 'Pending Approval',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect('/products')->with('success', 'Product added successfully!');
    }

    public function dashboard() {
    try {
        // Fetch data
        $totalProducts = DB::table('products')->count();
        $totalValue = DB::table('products')->sum(DB::raw('price * available_stock')) ?? 0;

        // Return the view with variables
        return view('dashboard', compact('totalProducts', 'totalValue'));
        
    } catch (\Exception $e) {
        // This will stop the "white screen" and tell us the real error
        return "Database Error: " . $e->getMessage();
    }
}

    public function edit($product_id) {
        $product = DB::table('products')->where('product_id', $product_id)->first();
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $product_id) {
        DB::table('products')->where('product_id', $product_id)->update([
            'name' => $request->name,
            'category' => $request->category,
            'price' => $request->price,
            'available_stock' => $request->available_stock,
            'updated_at' => now(),
        ]);
        return redirect('/products')->with('success', 'Product updated!');
    }

    public function destroy($product_id) {
        DB::table('products')->where('product_id', $product_id)->delete();
        return redirect('/products')->with('success', 'Product removed.');
    }
}