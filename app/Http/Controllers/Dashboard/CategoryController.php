<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $listCategory = Category::all();
        return view('dashboard.category.index', compact('listCategory'));
    }

    public function create()
    {
        return view('dashboard.category.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'categoryName' => 'required|string',
            'image' => 'required|image|mimes:svg'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $category = new Category();
        $category->name = $request->categoryName;
        $category->image = $request->image->move('images/category', $request->image->hashName());

        if ($category->save()) {
            return redirect()->route('dashboard.category')->with('message', "Category berhasil ditambahkan!");
        } else {
            return redirect()->back()->withInput()->with('errorMessage', "Category gagal ditambahkan!");
        }
    }

    public function edit(Request $request, $categoryId)
    {
        $category = Category::findOrFail($categoryId);

        return view('dashboard.category.edit', compact('category'));
    }

    public function update(Request $request, $categoryId)
    {
        $validator = Validator::make($request->all(), [
            'categoryName' => 'required|string',
            'image' => 'nullable|image|mimes:svg'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $category = Category::findOrFail($categoryId);
        $category->name = $request->categoryName;

        if ($request->hasFile('image')) {
            $category->image = $request->image->move('images/category', $request->image->hashName());
        }

        if ($category->save()) {
            return redirect()->route('dashboard.category')->with('successMessage', "Category berhasil diupdate!");
        } else {
            return redirect()->back()->with('errorMessage', "Category gagal diupdate!");
        }
    }

    public function delete(Request $request, $categoryId)
    {
        $category = Category::findOrFail($categoryId);

        if ($category->delete()) {
            return redirect()->route('dashboard.category')->with('successMessage', "Category berhasil dihapus!");
        } else {
            return redirect()->route('dashboard.category')->with('errorMessage', "Category gagal dihapus!");
        }
    }
}
