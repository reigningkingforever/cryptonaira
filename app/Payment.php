<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Payment extends Model
{
    use Notifiable;

    public function base(){
        return $this->belongsTo(Currency::class,'base_currency');
    }
    public function target(){
        return $this->belongsTo(Currency::class,'target_currency');
    }


}
