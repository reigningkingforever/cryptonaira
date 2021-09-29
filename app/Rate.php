<?php

namespace App;

use App\Currency;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $fillable = ['base','target','amount'];
    public static function boot()
    {
        parent::boot();
        parent::observe(new \App\Observers\RateObserver);
    }
    public function base_currency(){
        return $this->belongsTo(Currency::class,'base');
    }
    public function target_currency(){
        return $this->belongsTo(Currency::class,'target');
    }

}
