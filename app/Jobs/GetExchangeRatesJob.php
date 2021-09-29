<?php

namespace App\Jobs;

use App\Rate;
use Illuminate\Bus\Queueable;
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
            ->withHeader("X-Basic:".hash('sha256', config('app.coinqvest.key') . ':' . config('app.coinqvest.secret')))
            ->withData( array( 'sourceAsset' => 'BTC','targetAsset'=> 'NGN','amount'=>1) )
            ->asJson()
            ->get();
        }
        dd('ok');
    }
}
