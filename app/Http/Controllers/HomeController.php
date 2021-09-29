<?php

namespace App\Http\Controllers;

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
        // $key = '60d23b1bf293';
        // $secret = 'xXQa-XzfU-ma@2-H8tC-k@Nx-MuXq';
        // $basicAuthHash = hash('sha256', $key . ':' . $secret);
        // // dd($basicAuthHash);
        // $response = Curl::to('https://www.coinqvest.com/api/v1/exchange-rate')
        // ->withHeader("X-Basic:$basicAuthHash")
        // ->withData( array( 'sourceAsset' => 'USD','targetAsset'=> 'NGN','amount'=>1) )
        // ->asJson()
        // ->get();
        // dd($response);
        // GetExchangeRatesJob::dispatch();
        
        return view('index',compact('currencies'));
    }
    public function dashboard()
    {
        return view('home');
    }
}
