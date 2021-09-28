<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Currency;
class CurrencyController extends Controller
{
    public function index(){
        $currencies = Currency::all();
        return view('currencies.list',compact('currencies'));
    }
    public function edit(Currency $currency){
        return view('currencies.edit',compact('currency'));
    }
    public function store(Request $request){
        return redirect()->back();
    }
    public function update(Request $request){
        return redirect()->back();
    }
    public function destroy(Request $request){
        return redirect()->back();
    }
}
