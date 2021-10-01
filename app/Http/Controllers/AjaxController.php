<?php

namespace App\Http\Controllers;

use App\Bank;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;

class AjaxController extends Controller
{
    public function getAccount(Request $request){
        $result = Curl::to('https://api.paystack.co/bank/resolve')
        ->withHeader('Authorization: Bearer sk_live_1bb98205998c469512e315cbe61691e3472866db')
        ->withData( array( 'account_number' => $request->account_number,'bank_code'=> $request->bank_code ) )
        ->get();
        $response = json_decode($result);
        if(!$response || !$response->status) 
        return response()->json(401); 
        else  return response()->json(['name'=> $response->data->account_name],200);
        
        
    }
}
