<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuoteRequest;
use App\Http\Requests\UpdateQuoteRequest;
use App\Models\Quote;

class QuoteController extends Controller
{

    public function store($id, StoreQuoteRequest $request){
        $quote = new Quote();
        $this->validate($request, $request->rules());
        $quote->quote_ge = $request->store_quote_ge;
        $quote->quote_en = $request->store_quote_en;
        $quote->movie_id = $id;
        $quote['quote_img'] = $request->file('store_quote_img')->storePublicly('img');
        $quote->save();
        return redirect()->back()->with('success', 'Quote add!');
    }

    public function update($id, UpdateQuoteRequest $request) {
        $quote = Quote::find($id);
        $this->validate($request, $request->rules());
        $quote->quote_ge = $request->update_quote_ge;
        $quote->quote_en = $request->update_quote_en;
        if ($request->quote_img !== null){
            $quote['quote_img'] = request()->file('update_quote_img')->storePublicly('img');
        }
        $quote->save();
        return redirect()->back()->with('success', 'Quote updated!');
    }

    public function destroy($id)
    {
        $quote = Quote::find($id);
        $quote->delete();
        return redirect()->back()->with('success' ,'Quote deleted!');
    }

}
