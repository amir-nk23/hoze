<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsStoreRequest extends FormRequest
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
            'subtitle'=>'required',
            'summary'=>'required',
            'body'=>'required',
            'category_id'=>'required',
            'tag'=>'required',
            'image'=>'required',

        ];
    }

    public function messages()
    {
        return [
          'title.required'=>'لطفا تیتر خبر را انتخاب کنید',
            'subtitle.required'=>'لطفا موضوع را انتخاب کنید',
            'summary.required'=>'لطفا توضیحات خبر را بنویسید',
            'tag.required'=>'لطفا تگ خبر را وارد کنید',
            'category_id.required'=>'لطفا دسته خود را وارد کنید',
            'body.required'=>'لطفا متن خبر را بنویسید',
            'image.required'=>'لطفا عکس خبر را انتخاب کنید',
        ];
    }
}
