<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleStoreRequest extends FormRequest
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
            'category_id'=>'required',
            'image'=>'required',
            'status'=>'required',
        ];
    }


    public function messages()
    {
        return [
            'title.required'=>'لطفا تیتر مقاله را انتخاب کنید',
            'summary.required'=>'لطفا توضیحات مقاله را بنویسید',
            'category_id.required'=>'لطفا دسته خود را وارد کنید',
            'body.required'=>'لطفا متن مقاله را بنویسید',
            'image.required'=>'لطفا عکس مقاله را انتخاب کنید',
            'status.required'=>'لطفا وضعیت مقاله را انتخاب کنید',
        ];
    }
}
