<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnouncementStoreRequest extends FormRequest
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
            'body'=>'required',
            'image'=>'required',
            'status'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'لطفا تیتر اطلاعیه را انتخاب کنید',
            'summary.required'=>'لطفا توضیحات اطلاعیه را بنویسید',
            'body.required'=>'لطفا متن اطلاعیه را بنویسید',
            'image.required'=>'لطفا عکس اطلاعیه را انتخاب کنید',
            'status.required'=>'لطفا وضعیت اطلاعیه را مشخص کنید'
        ];
    }
}
