<?php

namespace App;

use App\Rate;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    public function rates(){
        return $this->hasMany(Rate::class,'base');
    }
}
