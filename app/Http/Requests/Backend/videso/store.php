<?php

namespace App\Http\Requests\Backend\videso;

use Illuminate\Foundation\Http\FormRequest;

class store extends FormRequest
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
        'name' => ['required', 'max:191'],
        'des'  =>['required', 'min:10'],
        'meta_keywords'=>['max:191'],
        'meta_description'=>['max:191'],
        'youtube' =>['required', 'min:10','url'],
        'published' => ['required'],
        'cat_id'=>['required','integer'],
        'image' => ['required','image']
        ];
    }
}