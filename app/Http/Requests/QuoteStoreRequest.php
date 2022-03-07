<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class QuoteStoreRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return [
			'movie_id'  => 'required',
			'quote_en'  => 'required|min:3|max:255',
			'quote_ge'  => 'required|min:3|max:255',
			'quote_img' => 'required|image',
		];
	}

	public function failedValidation(Validator $validator)
	{
		throw new HttpResponseException(response()->json([
			'status'  => 422,
			'message' => 'Validation error!',
			'errors'  => $validator->errors(),
		], 422));
	}
}
