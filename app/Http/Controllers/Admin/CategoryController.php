<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FormCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\CategoryService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{

    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function createView(){
        $this->authorize('create',Category::class);
        return View('logged.admin.categories.create');
    }

    public function editView(Category $category){
        $this->authorize('update',$category);
        return View('logged.admin.categories.edit',[
            'category' => $category,
            'title' => "Edit Category ".$category->name,
        ]);
    }

    public function create(FormCategoryRequest $request)
    {
        $this->authorize('create',Category::class);
        
        $this->categoryService->create($request);

        return redirect()->back()->withSuccess('Create category successfully!');
    }

    public function list(Request $request)
    {
        $this->authorize('viewAny',Category::class);
        $categories = Category::sortable()->paginate(7);
        return View('logged.admin.categories.list', [
            "categories" => $categories,
            "filter" => $request->input("filter"),
            "request" => $request,
        ]);
    }

    public function search(Request $request)
    {
        $this->authorize('viewAny',Category::class);
        $value = $request->input('value', '');
        $categories = Category::sortable()->where('name', 'like', '%' . $value . '%')->paginate(7);

        if ($categories) {
            $html = view('logged.admin.categories.table', [
                "categories" => $categories,
                "filter" => $request->input("filter"),
                "request" => $request,
            ])->render();
        } else {
            $html = '';
        }

        return response()->json(['html'=>$html]);
    }

    public function destroy(Request $request): JsonResponse{
        $id = $request->input('id');
        $category = Category::where('id', $id)->first();

        $this->authorize('delete', $category);

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

    public function edit(FormCategoryRequest $request, Category $category){
        $this->authorize('update',$category);
        try{
            $category->fill($request->input());
            $category->save();
            Session::flash('success', 'Update successfully');
        } catch (Exception $e){
            Session::flash('Error', 'Error. Try again!!');
            Log::info($e->getMessage());
        }
        return redirect()->back();
    }
}
