<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginUpdateRequest extends FormRequest
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
            'mobile'=>'size:11',
            'email'=>'email'
        ];
    }

    public function messages()
    {
        return [
            'mobile.size'=>'لطفا شماره را به صورت صحیح وارد کنید',
            'email.email'=>'لطفا ایمیل حود را به صورت صحیح وارد کنید'
        ];
    }
}
