<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class MovieUpdateRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return [
			'name_en' => 'required|min:3|max:255',
			'name_ge' => 'required|min:3|max:255',
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
