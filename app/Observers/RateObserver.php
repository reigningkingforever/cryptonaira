<?php

namespace App\Observers;

use App\Rate;
use App\Jobs\GetExchangeRatesJob;

class RateObserver
{
    
    public function created(Rate $rate)
    {
        // GetExchangeRatesJob::dispatch();
    }

    /**
     * Handle the rate "updated" event.
     *
     * @param  \App\Rate  $rate
     * @return void
     */
    public function updated(Rate $rate)
    {
        //
    }

    /**
     * Handle the rate "deleted" event.
     *
     * @param  \App\Rate  $rate
     * @return void
     */
    public function deleted(Rate $rate)
    {
        //
    }

    /**
     * Handle the rate "restored" event.
     *
     * @param  \App\Rate  $rate
     * @return void
     */
    public function restored(Rate $rate)
    {
        //
    }

    /**
     * Handle the rate "force deleted" event.
     *
     * @param  \App\Rate  $rate
     * @return void
     */
    public function forceDeleted(Rate $rate)
    {
        //
    }
}
