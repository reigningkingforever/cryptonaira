<?php

namespace App\Http\Middleware;

use Browser;

use Closure;
use App\Location;
use Illuminate\Support\Str;
use Ixudra\Curl\Facades\Curl;
use App\Http\Traits\GeoLocationTrait;

class VisitorMiddleware
{
    use GeoLocationTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $banned = Location::where('banned',true)->get();
        abort_if(in_array($request->ip(),$banned->pluck('ip_address')->toArray()),403);
        $exist = Location::where('ip_address',$request->ip())->first();
        if(!$exist && !(Str::contains($request->path(), ['css', 'font','js']))){
            
            $place = Curl::to('https://ipapi.co/json')
                    ->withData( array( 'key' => config('services.ip_api') ) )
                    ->asJsonResponse()
                    ->get();
                    //dd($place);
            if(isset($place->country_code))
            $temp = ['iso_code'=> $place->country_code,'country'=> $place->country_name,'state'=> $place->region,'city'=> $place->city,'timezone'=> $place->timezone] ;
            else
            $temp = ['iso_code'=> 'NG','country'=> 'Nigeria','state'=>'Lagos','city'=>'Lagos','timezone'=> 'Africa/Lagos'];
            if(Browser::isMobile() == 'mobile')
                $device = 'mobile';
            else if(Browser::isTablet() == 'tablet')
                $device = 'tablet';
            else if(Browser::isDesktop() == 'desktop')
                $device = 'desktop';
            else $device = 'bot'; 
            $visitor = Location::firstOrCreate(
                ['ip_address' => request()->ip(),
                'timezone'=> $temp['timezone'],
                'country'=> $temp['country'],
                'state'=> $temp['state'],
                'city'=> $temp['city'],
                'device_type'=> $device,
                'device_name'=> Browser::deviceFamily().' '.Browser::deviceModel(),
                'platform'=> Browser::platformName(),
                'browser'=> Browser::browserFamily(),
                'language' => substr($request->server('HTTP_ACCEPT_LANGUAGE'),0,2),
                'url' => request()->url(),
                'method' => request()->method()
                ]);
    
            
        }
        
        return $next($request);
    }
}
