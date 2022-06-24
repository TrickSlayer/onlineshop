<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MapController extends Controller
{

    public function html($param)
    {
        return '<iframe width="100%" height="500" id="google-map" 
            src="https://maps.google.com/maps?q=' . $param . '&output=embed"></iframe>';
    }

    public function searchByName(Request $request)
    {
        $address = $request->input("address");
        $address = trim($address);
        $address =  Str::replace(' ', '+', $address);
        return self::html($address);
    }

}
