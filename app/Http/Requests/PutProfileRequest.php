<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PutProfileRequest extends FormRequest
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
            'full_name' => 'required',
            'confirm_password' => 'required|string|min:6|alpha_num',
            'new_password' => 'nullable|string|min:6|alpha_num',
            'confirm_new_password' => 'nullable|string|min:6|alpha_num|same:new_password',
            'profile_picture' => 'sometimes|file|mimes:jpg,png|max:100'
        ];
    }
}
