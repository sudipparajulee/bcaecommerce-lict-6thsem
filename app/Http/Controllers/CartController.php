<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required',
            'quantity' => 'required|integer|min:1',
        ]);
        $data['user_id'] = Auth::user()->id;
        Cart::create($data);
        return redirect()->back()->with('success', 'Product added to cart successfully.');
    }

    public function mycart()
    {
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        return view('mycart', compact('carts'));
    }
}
