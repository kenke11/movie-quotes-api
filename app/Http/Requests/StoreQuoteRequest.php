<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class StoreQuoteRequest extends FormRequest
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
            'store_quote_ge' => 'required',
            'store_quote_en' => 'required',
            'store_quote_img' => 'required|image'
        ];
    }
}
