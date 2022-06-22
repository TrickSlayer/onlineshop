<?php

namespace App\Http\Services;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CategoryService
{
    public function create(Request $request){
        Category::create([
            "name" => $request->input("name"),
            "description" => $request->input("description"),
            "content" => $request->input("content"),
            "thumb" => $request->input("thumb"),
            "active" => $request->input("active"),
        ]);
    }

    
}