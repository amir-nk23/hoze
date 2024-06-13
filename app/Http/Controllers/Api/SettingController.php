<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function index()
    {

            $setting = Setting::query()->select('id', 'group', 'label', 'value',)->get();

        return response()->success('',compact('setting',));


    }


}
