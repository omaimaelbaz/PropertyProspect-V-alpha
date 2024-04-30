<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\categories;
use Illuminate\Http\Request;
use PhpParser\Builder\Function_;

class CategoryController extends Controller
{
    public function getCategory()
    {
        $categories = categories::get();
        // dd($categories);
        return view('Admin.propertyCategory',compact('categories'));
    }
    public function categoryFormAdd()
    {
        return view('Admin.addCategory');
    }

    public function addCategory(CategoryRequest $request)
    {
        $validateData = $request->validated();
        $category =  categories::create([
            'name' => $validateData['name']
        ]);
        $category->save();
        return redirect('/category');
    }

    public function deleteCategory($id)
    {
        $category = categories::find($id);
        $category->delete();
        return back();

    }

    public function updateCategory($id)
    {
        $category = categories::find($id);
        return view('Admin.updateCategory',compact('category'));
    }

    public Function modifyCategory(CategoryRequest $request,$id)
    {
        $validateData = $request->validated();
        $category = categories::find($id);
        $category->update($validateData);

        return redirect('/category');
    }
}
