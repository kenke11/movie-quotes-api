<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
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
            'name_ge' => ['required',  'max:255' ],
            'name_en' => ['required',  'max:255'],
            'quote_ge' => ['required', ],
            'quote_en' => ['required', ],
            'img' => 'required|image',
        ];
    }
}
