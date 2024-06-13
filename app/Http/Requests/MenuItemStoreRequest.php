<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use function PHPUnit\Framework\throwException;

class MenuItemStoreRequest extends FormRequest
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
            //
        ];
    }


    protected function passedValidation()
    {

        if ($this->input('linkable_id') && $this->input('link')){


            toastr()->error('لطفا دسته  بندی انتخاب شده را پر کنید');
            throw ValidationException::withMessages([

                'same'=>['لطفا دسته  بندی انتخاب شده را پر کنید']

            ]);

        }

    }
}
