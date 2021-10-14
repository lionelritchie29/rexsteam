<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostGameRequest extends FormRequest
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
            'game_title' => 'required|unique:games,title',
            'game_description' => 'required|string|max:500',
            'game_long_description' => 'required|string|max:2000',
            'category_id' => 'required',
            'game_developer' => 'required',
            'game_publisher' => 'required',
            'game_price' => 'required|numeric|max:1000000',
            'image_cover' => 'required|file|mimes:jpg|max:100',
            'video_trailer' => 'required|file|mimes:webm|max:100000',
        ];
    }
}
