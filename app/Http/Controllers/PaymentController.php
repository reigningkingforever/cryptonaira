<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use App\Notifications\AddressNotification;

class PaymentController extends Controller
{
    
    public function generateAddress(Request $request)
    {
        $response = Curl::to('https://www.coinqvest.com/api/v1/deposit')
        ->withHeaders( array("X-Basic" => hash('sha256',   config('services.coinqvest.key').':'.config('services.coinqvest.secret')  )))
        ->withData( array( "sourceNetworkCode" => $request->currency) )
        ->asJson()
        ->post();
        
        $payment = new Payment;
        $payment->reference = $response->deposit->id;
        $payment->email = $request->email;
        $payment->base_currency = $request->currency;
        $payment->base_amount = $request->amount;
        $payment->address = $response->deposit->depositAddress;
        $payment->target_currency = 'NGN';
        $payment->target_amount = $request->target_amount;
        $payment->bank_code = $request->bank_code;
        $payment->account_number = $request->account_number;
        $payment->save();
        $payment->notify(new AddressNotification);
        // dd($request->all());
        // return response()->json(['address'=> 'bc1q4xan5rzu7kns9wxzdn4urna60uh4f7d2shsayalqzlcmfmnkc8dsnh7rp8'],200);
        return response()->json(['address'=> $payment->address],200);

    }

  
    public function depositConfirmation(Request $request){
        // $request->getContent()
        $authHeader = $_SERVER['HTTP_X_WEBHOOK_AUTH'];
        $payload = file_get_contents("php://input");

        if ($authHeader != hash('sha256', config('services.coinqvest.secret') . $payload)) {
            exit();
        }
        $payload = json_decode(file_get_contents("php://input"), true);
        $type = $payload['eventType'];
        $data = $payload['data'];

        switch($type) {
            case('CHECKOUT_COMPLETED'):
                // do something when a checkout was successfully completed
                break;
            case('CHECKOUT_UNDERPAID'):
                // do something when a checkout was underpaid
                break;
            case('UNDERPAID_ACCEPTED'):
                // do something when an underpaid checkout was manually accepted
                break;
            case('REFUND_COMPLETED'):
                // do something when a refund completed
                break;
            case('DEPOSIT_COMPLETED'):
                // do something when a deposit completed
                break;
            break;
        }
        //
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
