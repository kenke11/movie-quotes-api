<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class UpdateMovieRequest extends FormRequest
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
            'name_ge' => ['required', 'regex:/^[ა-ჰs]+$/', ],
            'name_en' => ['required', 'regex:/^[a-zA-Z\s]+$/', ],
            'quote_ge' => ['required', 'regex:/^[ა-ჰs]+$/', ],
            'quote_en' => ['required', 'regex:/^[a-zA-Z\s]+$/', ],
        ];
    }
}
