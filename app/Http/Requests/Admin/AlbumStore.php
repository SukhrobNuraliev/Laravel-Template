<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class AlbumStore extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:100',
            'slug' => 'required|max:100|alpha_dash|unique:image_albums,slug',
            'description' => 'max:500'
        ];
    }
}