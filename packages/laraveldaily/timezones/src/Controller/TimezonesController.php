<?php
namespace Laraveldaily\Timezones\Controller;
 
use App\Http\Controllers\Controller;
use Carbon\Carbon;
 
class TimezonesController extends Controller
{
    public function timezoneApi($timezone = NULL)
    {
        $current_time = ($timezone) ? Carbon::now(str_replace('-', '/', $timezone))  : Carbon::now();
        
        return $current_time;
    }


    public function timezone($timezone = NULL)
    {
        $current_time = self::timezoneApi($timezone);

        return view('timezones::time', compact('current_time'));
    }

}
