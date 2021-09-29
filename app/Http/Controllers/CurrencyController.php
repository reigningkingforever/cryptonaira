<?php

namespace App\Http\Controllers;

use App\Rate;
use App\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function index(){
        $currencies = Currency::all();
        return view('currencies.list',compact('currencies'));
    }
    public function edit(Currency $currency){
        $currencies = Currency::all();
        return view('currencies.edit',compact('currency','currencies'));
    }
    public function store(Request $request){
        $currency = new Currency;
        $currency->name = $request->name;
        $currency->symbol = $request->symbol;
        $currency->status = $request->status;
        $currency->save();

        return redirect()->back();
    }
    public function update(Request $request,Currency $currency){
        $currency->name = $request->name;
        $currency->symbol = $request->symbol;
        $currency->status = $request->status;
        $currency->save();
        return redirect()->back();
    }
    public function rates(){
        $rates = Rate::all();
        $currencies = Currency::all();
        return view('currencies.rates',compact('rates','currencies'));
    }
    public function storeRates(Request $request){
        $rate = Rate::updateOrCreate(['base' => $request->base,'target' => $request->target]);
        return redirect()->back();
    }
    public function destroy(Request $request){
        return redirect()->back();
    }
}
