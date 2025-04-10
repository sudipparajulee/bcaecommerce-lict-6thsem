<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('priority')->get();
        return view('categories.index',compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'priority' => 'required|numeric',
        ]);

        Category::create($data);
        return redirect()->route('category.index')->with('success','Category created successfully');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('categories.edit',compact('category'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'priority' => 'required|numeric',
        ]);

        $category = Category::find($id);
        $category->update($data);
        return redirect()->route('category.index')->with('success','Category updated successfully');
    }

    public function destroy(Request $request)
    {
        $category = Category::find($request->id);
        $category->delete();
        return redirect()->route('category.index')->with('success','Category deleted successfully');
    }
}
