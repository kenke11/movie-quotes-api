<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuoteRequest;
use App\Http\Requests\UpdateQuoteRequest;
use App\Models\Quote;
use Illuminate\Support\Facades\Storage;

class QuoteController extends Controller
{

    /**
     * Store a newly created quote in storage.
     *
     * @param int $id movie_id
     * @param  \App\Http\Requests\StoreQuoteRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store($id, StoreQuoteRequest $request){
        $quote = new Quote();
        $fieldQuote = $request->validated();
        $translations = [
            'en' => $request->quote_en,
            'ge' => $request->quote_ge
        ];
        $quote->setTranslations('quote', $translations);
        $fieldQuote['quote'] = $quote->getTranslations('quote');
        $fieldQuote['movie_id'] = $id;
        $fieldQuote['quote_img'] = $request->file('quote_img')->storePublicly('img');
        Quote::create($fieldQuote);
        return redirect()->back()->with('success', 'Quote add!');
    }

    /**
     * Update the specified quote in storage.
     *
     * @param  \App\Http\Requests\UpdateQuoteRequest  $request
     * @param  int  $id quote id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, UpdateQuoteRequest $request) {
        $quote = Quote::find($id);
        $fieldQuote = $request->validated();
        $translations = [
            'en' => $request->quote_en,
            'ge' => $request->quote_ge
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

    /**
     * Remove the specified quote from storage.
     *
     * @param  int  $id quote id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $quote = Quote::find($id);
        Storage::delete($quote->quote_img);
        $quote->delete();
        return redirect()->back()->with('success' ,'Quote deleted!');
    }

}
