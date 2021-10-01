<?php

namespace App\Console;

use App\Payment;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $payments = Payment::where('base_status','AWAITING_DEPOSIT')->orderBy('created_at','ASC')->get();
            if($payments->isNotEmpty()){
                foreach($payments as $payment){
                    $response = Curl::to('https://www.coinqvest.com/api/v1/deposit')
                    ->withHeaders( array("X-Basic" => hash('sha256',   config('services.coinqvest.key').':'.config('services.coinqvest.secret')  )))
                    ->withData( array( "id" => $payment->reference) )
                    ->asJson()
                    ->get();
                    // dd($response->deposit->state);
                    if($response->deposit->state != 'AWAITING_DEPOSIT')
                    $payment->base_status = $response->deposit->state;
                    $payment->save();
                }
            }
        })->everyMinute();
        $schedule->job(new GetExchangeRatesJob)->everyFifteenMinutes();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
