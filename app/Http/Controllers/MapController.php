<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Stevebauman\Location\Facades\Location;

class MapController extends Controller
{

    public function html($param)
    {
        return '<iframe width="100%" height="500" id="google-map" name="map" title="map"
            src="https://maps.google.com/maps?q=' . $param . '&output=embed"></iframe>';
    }

    public function searchByName(Request $request)
    {
        $address = $request->input("address");
        $address = trim($address);
        $address =  Str::replace(' ', '+', $address);
        return self::html($address);
    }

    public function searchByCoordinate(Request $request)
    {
        $data = self::ip($request);
        if ($data) {
            return [
                self::html($data["latitude"] . ', ' . $data["longitude"]),
                [
                    $data["latitude"],
                    $data["longitude"]
                ]
            ];
        } else {
            $request->request->add(['address' => 'Hà Nội']);
            return [
                self::searchByName($request),
                "Hà Nội"
            ];
        }
    }

    public function ip(Request $request)
    {
        if ($request->ip() != "127.0.0.1") {
            $ip =  $request->ip(); //Dynamic IP address get
        } else {
            return false;
        }

        $data = Location::get($ip);

        return [
            "ip" => $ip,
            "latitude" => $data->latitude,
            "longitude" => $data->longitude
        ];
    }
}
