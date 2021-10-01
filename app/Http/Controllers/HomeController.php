<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Rate;
use App\Currency;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use App\Jobs\GetExchangeRatesJob;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $currencies = Currency::where('status',true)->get();
        GetExchangeRatesJob::dispatch();
        $rates = Rate::all();
        $banks = Bank::orderBy('name','ASC')->get();
        return view('index',compact('currencies','rates','banks'));
    }
    public function dashboard()
    {
        return view('home');
    }
}
