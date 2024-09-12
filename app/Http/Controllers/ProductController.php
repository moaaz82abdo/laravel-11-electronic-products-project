<?php


namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
 
    public function index(Request $request)
    {
        $sortField = $request->get('sort', 'category_id'); 
        $sortDirection = $request->get('direction', 'asc'); 

        $products = Product::with('category')
            ->orderBy($sortField, $sortDirection)
            ->get();

        return view('products.index', compact('products', 'sortField', 'sortDirection'));
        // $products = Product::with('category')->get();
        // return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock_quantity' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock_quantity' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

//     public function lowStock()
// {
//     $lowStockProducts = Product::where('stock_quantity', '<=', 5)->get(); 
//     return view('products.low_stock', compact('lowStockProducts'));
// }
public function lowStock()
{
    $lowStockProducts = Product::where('stock_quantity', '<=', 10)->get(); 
    return view('products.lowStock', compact('lowStockProducts'));
}

}
