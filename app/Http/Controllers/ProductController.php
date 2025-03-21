<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index');
    }

    public function create()
    {
        $categories = Category::orderBy('priority')->get();
        return view('products.create',compact('categories'));
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy(Request $request)
    {

    }

}
