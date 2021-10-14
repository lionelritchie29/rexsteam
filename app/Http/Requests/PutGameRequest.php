<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PutGameRequest extends FormRequest
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
            'game_description' => 'required|string|max:500',
            'game_long_description' => 'required|string|max:2000',
            'category_id' => 'required',
            'game_price' => 'required|numeric|max:1000000',
            'image_cover' => 'sometimes|required|file|mimes:jpg|max:100',
            'video_trailer' => 'sometimes|required|file|mimes:webm|max:100000',
        ];
    }
}
