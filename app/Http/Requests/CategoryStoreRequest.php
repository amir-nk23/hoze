<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class CategoryStoreRequest extends FormRequest
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
            'title'=>'required|max:75',
            'type'=>'required',
            'status'=>'required'

        ];
    }


    public function messages(): array
    {
        return [
            'title.required' => 'لطفا عنوان خود را وارد کنید',
            'title.max' => 'کاراکتر ها ی ورودی بیش از حد مجاز است',
            'type.required' => 'لطفا دسته خود را انتخاب کنید',
            'status.required' => 'لطفا وضعیت خود را انتخاب کنید',
        ];
    }

    public function passedValidation()
    {

        if (Category::where([

            ['title',$this->input('title')],
            ['type',$this->input('type')]

        ])->first()){

            throw ValidationException::withMessages(['find'=>'این دسته یندی قبلا ثبت شده است']);

        }

    }
}
