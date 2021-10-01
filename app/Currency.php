<?php

namespace App;

use App\Rate;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    public function rates(){
        return $this->hasMany(Rate::class,'base');
    }
    public function nairaRate(){
        $naira = Self::where('symbol','NGN')->first()->id;
        return $this->hasOne(Rate::class,'base')->where('target',$naira);
    }
}
