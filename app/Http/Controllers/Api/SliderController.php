<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{

    public function index(){

        $sliders = Slider::query()->select('id','link','title','summary','image',)->where('status',1)->paginate(5);

        return response()->success('',compact('sliders',));

    }

}
