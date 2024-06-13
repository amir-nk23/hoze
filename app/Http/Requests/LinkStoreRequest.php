<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LinkStoreRequest extends FormRequest
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
            'title.required'=>'لطفا تیتر پیوند را انتخاب کنید',
            'summary.required'=>'لطفا توضیحات پیوند را بنویسید',
            'link.required'=>'لطفا لینک پیوند را بنویسید',
            'link.url'=>'لطفا لینک را به صورت صحیح وارد کنید',
            'image.required'=>'لطفا عکس پیوند را انتخاب کنید',
            'status.required'=>'لطفا وضعیت پیوند را مشخص کنید'
        ];
    }
}
