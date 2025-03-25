<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('products.index',compact('products'));
    }

    public function create()
    {
        $categories = Category::orderBy('priority')->get();
        $brands = Brand::orderBy('priority')->get();
        return view('products.create',compact('categories','brands'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'price' => 'required|numeric',
            'discounted_price' => 'nullable|numeric|lt:price',
            'stock' => 'required|numeric',
            'description' => 'required',
            'photopath' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        //store photopath
        $filename = $request->file('photopath')->getClientOriginalExtension();
        $filename = time().'.'.$filename;
        $request->file('photopath')->move(public_path('images/products'), $filename);
        $data['photopath'] = $filename;

        Product::create($data);
        return redirect()->route('product.index')->with('success','Product created successfully');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::orderBy('priority')->get();
        $brands = Brand::orderBy('priority')->get();
        return view('products.edit',compact('product','categories','brands'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $data = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'price' => 'required|numeric',
            'discounted_price' => 'nullable|numeric|lt:price',
            'stock' => 'required|numeric',
            'description' => 'required',
            'photopath' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

        if($request->hasFile('photopath')){
            //store photopath
            $filename = $request->file('photopath')->getClientOriginalExtension();
            $filename = time().'.'.$filename;
            $request->file('photopath')->move(public_path('images/products'), $filename);
            $data['photopath'] = $filename;
            //delete old file
            File::delete(public_path('images/products/'.$product->photopath));
        }

        $product->update($data);
        return redirect()->route('product.index')->with('success','Product updated successfully');
    }

    public function destroy(Request $request)
    {
        $product = Product::find($request->id);
        File::delete(public_path('images/products/'.$product->photopath));
        $product->delete();
        return redirect()->route('product.index')->with('success','Product deleted successfully');
    }

}
