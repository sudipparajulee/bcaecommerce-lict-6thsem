<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $latestproducts = Product::latest()->take(4)->get();
        return view('welcome', compact('latestproducts'));
    }

    public function about()
    {
        return view('about');
    }

    public function categoryproduct($id)
    {
        $category = Category::findOrFail($id);
        $products = Product::where('category_id', $id)->latest()->get();
        return view('categoryproduct', compact('category', 'products'));
    }

    public function viewproduct($id)
    {
        $product = Product::findOrFail($id);
        $relatedproducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $id)
            ->latest()
            ->take(4)
            ->get();
        return view('viewproduct', compact('product','relatedproducts'));
    }

    public function checkout($cartid)
    {
        $cart = Cart::findOrFail($cartid);
        return view('checkout', compact('cart'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $products = Product::where('name', 'like', '%' . $search . '%')->latest()->get();
        return view('search', compact('products', 'search'));
    }
}
