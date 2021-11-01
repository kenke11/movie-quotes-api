<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuoteRequest;
use App\Http\Requests\UpdateQuoteRequest;
use App\Models\Quote;
use Illuminate\Support\Facades\Storage;

class QuoteController extends Controller
{

    public function store($id, StoreQuoteRequest $request){
        $quote = new Quote();
        $fieldQuote = $request->validated();
        $translations = [
            'en' => $request->quote['en'],
            'ge' => $request->quote['ge']
        ];
        $quote->setTranslations('quote', $translations);
        $fieldQuote['quote'] = $quote->getTranslations('quote');
        $fieldQuote['movie_id'] = $id;
        $fieldQuote['quote_img'] = $request->file('quote_img')->storePublicly('img');
        Quote::create($fieldQuote);
        return redirect()->back()->with('success', 'Quote add!');
    }

    public function update($id, UpdateQuoteRequest $request) {
        $quote = Quote::find($id);
        $fieldQuote = $request->validated();
        $translations = [
            'en' => $request->quote['en'],
            'ge' => $request->quote['ge']
        ];
        $quote->setTranslations('quote', $translations);
        $fieldQuote['quote'] = $quote->getTranslations('quote');
        if ($request->quote_img !== null){
            Storage::delete($quote->quote_img);
            $fieldQuote['quote_img'] = request()->file('quote_img')->storePublicly('img');
        }
        $quote->update($fieldQuote);
        return redirect()->back()->with('success', 'Quote updated!');
    }

    public function destroy($id)
    {
        $quote = Quote::find($id);
        Storage::delete($quote->quote_img);
        $quote->delete();
        return redirect()->back()->with('success' ,'Quote deleted!');
    }

}
