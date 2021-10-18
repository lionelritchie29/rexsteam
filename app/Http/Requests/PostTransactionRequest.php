<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostTransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'card_name' => 'required|string|min:6',
            'card_number' => 'required',
            'mm' => 'required|numeric|between:1,12',
            'yy' => 'required|numeric|between:2021,2050',
            'cvv' => 'required|string|between:3,4',
            'zipcode' => 'required|numeric',
        ];
    }
}
