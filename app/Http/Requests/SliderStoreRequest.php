<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'title'=>'required',
            'summary'=>'required',
            'image'=>'required',
            'status'=>'required',
            'link'=>'required|url:http,https'


        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'لطفا تیتر اسلایدر را انتخاب کنید',
            'summary.required'=>'لطفا توضیحات اسلایدر را بنویسید',
            'link.required'=>'لطفا لینک اسلایدر را بنویسید',
            'link.url'=>'لطفا لینک را به صورت صحیح وارد کنید',
            'image.required'=>'لطفا عکس اسلایدر را انتخاب کنید',
            'status.required'=>'لطفا وضعیت اسلایدر را مشخص کنید'
        ];
    }
}
