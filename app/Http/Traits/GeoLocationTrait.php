<?php
namespace App\Http\Traits;

use App\City;
use App\State;
use App\Country;
use App\Currency;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Cache;

trait GeoLocationTrait
{
    protected function getLocation(){
        $location = Cache::rememberForever(request()->ip(), function () {
            $place = Curl::to('https://ipapi.co/json')
                    ->withData( array( 'key' => config('services.ip_api') ) )
                    ->asJsonResponse()
                    ->get();
                    //dd($place);
            if(isset($place->country_code))
                $temp = ['iso_code'=> $place->country_code,
                        'country'=> $place->country_name,
                        'state'=> $place->region ,
                        'state_code'=> $place->region_code ,
                        'city'=> $place->city,
                        'dialing_code'=> $place->country_calling_code,
                        'flag'=>'https://ipdata.co/flags/'.$place->country_code.'.png',
                        'timezone'=> $place->timezone,
                        'currency_name' => $place->currency_name,
                        'currency_iso' => $place->currency];
            else
                $temp = ['iso_code'=> 'NG',
                        'country'=> 'Nigeria',
                        'state'=>'Lagos',
                        'state_code'=>'LA',
                        'city'=>'Lagos',
                        'flag'=>'https://ipdata.co/flags/ng.png',
                        'dialing_code'=> '+234',
                        'timezone'=> 'Africa/Lagos',
                        'currency_name' => 'Naira',
                        'currency_iso' => 'NGN'];
            $country = $this->getCountry($temp['iso_code'],$temp['country'],$temp['dialing_code']);
            $state = $this->getState($country->id,$temp['state'],$temp['state_code']);
            $city = $this->getCity($state->id,$temp['city']);
            $currency = $this->getCurrency($temp['currency_iso'],$temp['currency_name'],$country->id);
            $userinfo = ['country_id'=> $country->id,
                        'country_code'=> $country->iso_code,
                        'country'=> $country->name,
                        'state_id'=> $state->id,
                        'state'=> $temp['state'],
                        'city_id'=> $city->id,
                        'city'=> $temp['city'],
                        'timezone'=> $temp['timezone'],
                        'country_dialing_code' => $country->dialing_code,
                        'country_currency'=> $country->currency->id,
                        'timezone'=> $temp['timezone'],
                        ];
            return $userinfo;
        });
        return $location;
    }
    protected function getCountry($iso,$name,$dial = null){
        $country = Country::firstOrCreate(['iso_code'=> strtoupper($iso)], 
                                ['name'=> $name,
                                'dialing_code'=>'+'.$dial,
                                'flag'=>'https://ipdata.co/flags/'.$iso.'.png' 
                                ]);
        return $country;
    }
    protected function getState($country_id,$name,$code = null){
        $state = State::firstOrCreate(['country_id'=> $country_id,'name'=> $name ],[ 'code'=> $code]);
        return $state;
    }
    protected function getCity($state_id,$name){
        $city = City::firstOrCreate(['state_id'=> $state_id,'name'=> $name ]);
        return $city;
    }
    protected function getCurrency($iso,$name = null,$country_id = null){
        $currency = Currency::firstOrcreate(['iso'=> $iso],['name'=> $name,'country_id'=> $country_id ] );
        return $currency;
    }
}

