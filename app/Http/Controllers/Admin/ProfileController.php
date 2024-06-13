<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

    public function edit()
    {

        $user=User::find(Auth::id())->first();

        return view('admin.profile.edit',compact('user'));

    }

    public function update(LoginUpdateRequest $request,string $id)
    {

        $user=User::find($id);

        if ($request->hasFile('image'))
        {

            $image =  Storage::disk('public')->put('/profile',$request->image);

            $user->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'mobile'=>$request->mobile,
                'image'=>$image
            ]);

        }else
        {

            $user->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'mobile'=>$request->mobile,
            ]);

        }



        toastr()->success('پروفایل با موفقیت ویرایش شد');
        return redirect()->back();
    }


    public function changepassword(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'current_password' => 'required|string',
            'password' => 'required|string|confirmed',


        ]);

        if ($validator->fails()) {
            toastr()->error('پسوورد شما با تکرار ان مطابقت ندارد');
            return redirect()->back();
        }


        $user=Auth::user();
        if(Hash::check($request->current_password,$user->password)){


              $user->update([
                  'password'=>bcrypt($request->password)
              ]);

              Auth::logout();

              toastr()->success('پسوورد شما تغییر یافت');
              return redirect()->route('auth.login');



        }else{

            toastr()->error('پسوورد فعلی شما اشتباه می باشد');
            return redirect()->back();


        }


    }


}
