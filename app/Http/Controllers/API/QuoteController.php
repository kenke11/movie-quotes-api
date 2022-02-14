<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class QuoteController extends Controller
{
	public function store(Request $request)
	{
		$validator = Validator::make(
			$request->all(),
			[
				'movie_id'  => 'required',
				'quote_en'  => 'required|min:3|max:255',
				'quote_ge'  => 'required|min:3|max:255',
				'quote_img' => 'required|image',
			]
		);

		if ($validator->fails())
		{
			return response()->json([
				'status'  => 'error',
				'message' => 'Validation error!',
				'errors'  => $validator->errors(),
			]);
		}

		$quote = new Quote();

		$quote->movie_id = $request->movie_id;

		$translations = [
			'en' => $request->quote_en,
			'ge' => $request->quote_ge,
		];

		$quote->setTranslations('quote', $translations);
		$quote->quote = $quote->getTranslations('quote');

		$quote->quote_img = $request->file('quote_img')->storePublicly('img');

		$quote->save();

		$resQuote = [
			'id'          => $quote->id,
			'movie_id'    => $quote->movie_id,
			'quote'       => $translations,
			'quote_img'   => $quote->quote_img,
			'updated_at'  => $quote->updated_at,
			'created_at'  => $quote->created_at,
		];

		return response()->json([
			'status'  => 'success',
			'message' => 'Quote created successfully!',
			'quote'   => $resQuote,
		]);
	}

	public function update($id, Request $request)
	{
		$quote = Quote::find($id);

		$validator = Validator::make(
			$request->all(),
			[
				'quote_en'  => 'required|min:3|max:255',
				'quote_ge'  => 'required|min:3|max:255',
			]
		);

		if ($validator->fails())
		{
			return response()->json([
				'status'  => 'error',
				'message' => 'Validation error!',
				'errors'  => $validator->errors(),
			]);
		}

		$translations = [
			'en' => $request->quote_en,
			'ge' => $request->quote_ge,
		];

		$quote->setTranslations('quote', $translations);
		$quote->quote = $quote->getTranslations('quote');

		if ($request->img !== 'undefined')
		{
			Storage::delete($quote->quote_img);
			$quote->quote_img = $request->file('img')->storePublicly('img');
		}

		$quote->save();

		return response()->json([
			'status'  => 'success',
			'message' => 'Quote updated successfully!',
		]);
	}

	public function destroy($id)
	{
		$quote = Quote::find($id);
		Storage::delete($quote->quote_img);
		$quote->delete();

		return response()->json(['status' => 'Quote deleted!']);
	}
}
