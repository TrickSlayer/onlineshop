<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function create(FormCategoryRequest $request)
    {
        Category::create([
            "name" => $request->input("name"),
            "description" => $request->input("description"),
            "content" => $request->input("content"),
            "thumb" => $request->input("thumb"),
            "active" => $request->input("active"),
        ]);

        return redirect()->back()->withSuccess('Create category successfully!');
    }

    public function list(Request $request)
    {
        $categories = Category::sortable()->paginate(15);
        return View('admin.categories.list', [
            "categories" => $categories,
            "filter" => $request->input("filter"),
        ]);
    }

    public function search(Request $request)
    {
        $value = $request->input('value', '');
        $categories = Category::sortable()->where('name', 'like', '%' . $value . '%')->paginate(15);

        if ($categories) {
            $html = view('admin.categories.table', [
                "categories" => $categories,
                "filter" => $request->input("filter"),
            ])->render();
        } else {
            $html = '';
        }

        return response()->json(['html'=>$html]);
    }

    public function destroy(Request $request): JsonResponse{
        $id = $request->input('id');

        $category = Category::where('id', $id)->first();
        $url = str_replace("storage","public",$category->thumb);
        if ($category) {
            Storage::delete($url);
            $category->delete();
            return response()->json([
                'error' => false,
                'message' => 'Delete successfully'
            ]);
        }

        return response() -> json([
            'error' => true
        ]);
    }
}
