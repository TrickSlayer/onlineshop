<?php

use Illuminate\Support\Facades\Route;

Route::get('timezones/{timezone}',  'laraveldaily\timezones\TimezonesController@index');
