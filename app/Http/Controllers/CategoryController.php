<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create(FormCategoryRequest $request){
        Category::create([
            "name" => $request->input("name"),
            "description" => $request->input("description"),
            "content" => $request->input("content"),
            "thumb" => $request->input("thumb"),
            "active" => $request->input("active"),
        ]); 

        return redirect()->back()->withSuccess('Create category successfully!');
    }

    public function list(){
        $categories = Category::sortable()->paginate(15);
        return View('admin.categories.list', ["categories" => $categories]);
    }
}
