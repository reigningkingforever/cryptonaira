<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['ip_address','banned','timezone','country','state','city','device_type','device_name','platform','browser','language','url','method'];
}
