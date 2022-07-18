<?php

namespace Trick\Upload\Controller;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        $url = $this->store($request);

        if ($url !== false){
            return response()->json([
                'error' => false,
                'url' => $url
            ]);
        }

        return response()->json(['error' => true]);
    }

    private function store($request){
        if ($request->hasFile('file')) {
            try {
                $name = $request->file('file')->getClientOriginalName();
                $pathFull = 'uploads/' . date("Y/m/d/h/i/s");

                $path = $request->file('file')->storeAs(
                    'public/'.$pathFull,
                    $name
                );

                return $pathFull.'/'.$name;
            } catch (Exception $e) {
                return false;
            }
        }
    }

    public function delete(Request $request){
        $url = 'public/'.$request->url;
        $result = Storage::delete($url);
        if ($result){
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
