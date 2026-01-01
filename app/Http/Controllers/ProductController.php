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
    // 1. Basic Stats
    $totalProducts = DB::table('products')->count();
    $totalStock = DB::table('products')->sum('available_stock') ?? 0;
    $totalValue = DB::table('products')->sum(DB::raw('price * available_stock')) ?? 0;

    // 2. Data for Bar Chart: Group stock by Category
    $stockByCategory = DB::table('products')
        ->select('category', DB::raw('sum(available_stock) as total'))
        ->groupBy('category')
        ->get();

    // 3. Data for Pie Chart: Top 5 products by stock
    $topProducts = DB::table('products')
        ->orderBy('available_stock', 'desc')
        ->limit(5)
        ->get();

    return view('dashboard', compact(
        'totalProducts', 
        'totalStock', 
        'totalValue', 
        'stockByCategory', 
        'topProducts'
    ));
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