<?php

namespace App\Jobs;

use App\Rate;
use Illuminate\Bus\Queueable;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class GetExchangeRatesJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $rates = Rate::all();
        foreach($rates as $rate){
            $response = Curl::to('https://www.coinqvest.com/api/v1/exchange-rate')
            ->withHeaders( array("X-Basic" => hash('sha256',   config('services.coinqvest.key').':'.config('services.coinqvest.secret')  )))
            // ->withData( array( 'sourceAsset' => 'BTC','targetAsset'=> 'USD','amount'=>1) )
            ->withData( array( 'sourceAsset' => $rate->base_currency->symbol,'targetAsset'=> 'NGN','amount'=>1) )
            ->asJson()
            ->get();
            // dd($response);
            $rate->amount = $response->targetAmount;
            $rate->save();
        }
        
    }

    // {
    //     "sourceAsset": "BTC:GAUTUYY2THLF7SGITDFMXJVYH3LHDSMGEAKSBU267M2K7A3W543CKUEF",
    //     "sourceAmount": "0.01",
    //     "targetAsset": "EURT:GAP5LETOV6YIE62YAM56STDANPRDO7ZFDBGSNHJQIYGGKSMOZAHOOS2S",
    //     "targetAmount": "410.5791476",
    //     "pair": "EUR/BTC",
    //     "exchangeRate": "1:0.0000244",
    //     "deviation": "0.021",
    //     "switch": "send-amount"
    // }

}
