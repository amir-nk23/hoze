<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yoeunes\Toastr\Facades\Toastr;

class SettingController extends Controller
{
    public function index(){


        return view('admin.setting.index');

    }

    public function general(){

        $generals = Setting::query()->where('group','general')->get();
        return view('admin.setting.edit',compact('generals'));

    }



    public function social(){

        $generals = Setting::query()->where('group','social')->get();
        return view('admin.setting.edit',compact('generals'));


    }

    public function update(Request $request)
    {

        $input = $request->except('_token','_method');

        foreach ($input as $name => $value){

            if ($setting = Setting::where('name',$name)->first()){

                if ($setting->type=='img'&& $request->file($name)->isValid()){

                    if ($setting->value){

                        Storage::disk('public')->delete($setting->value);

                    }

                   $value =   Storage::disk('public')->put('/setting',$request->img);

                }

                $setting->update(['value'=>$value]);

            }

        }

            Toastr::success('تنظیمات با موفقیت تغییر یافت');
            return redirect()->back();

    }


    public function destroy(Request $request){

        $input = $request->except('_token','_method');
        $image=Setting::where('value',$input)->select('value');
        Storage::disk('public')->delete($input);
        $image->update([

            'value'=>''

        ]);

        return redirect()->back();

    }

}
