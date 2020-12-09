<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use \App\Category;


class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['isadmin'])->only(['index', 'create', 'update', 'edit', 'destroy']);
    }

    public function index()
    {
    	return view('category.index', ['categories' => Category::all()]);
    }

    public function create()
    {
        return view('category.create');
    }

    public function show(Category $category)
    {
        return view('category.show',['category' => $category]);
    }

    public function edit(Category $category)
    {
        return view('category.edit', ['category' => $category]);
    }

    public function store(Request $request)
    {

        $rules = [
            'name' => 'required|string|max:255',
        ];

        $this->validate($request, $rules);

        Category::create($request->all());

        $request->session()->flash('status', "{$request->name} was created");
        return redirect()->route('categories.index');
    }

    public function update(Request $request, Category $category)
    {

        $rules = [
            'name'=>'required|string|max:255',
        ];

        $this->validate($request, $rules);
        $category->update($request->all());

        $category->save();
        $request->session()->flash('status', "{$category->name} was updated");
        return redirect()->route('categories.index');
    }

    public function destroy(Request $request,Category $category)
    {

        $category->delete();
        $request->session()->flash('status', "{$category->name} was deleted");
		return redirect()->route('categories.index');
    }
}
