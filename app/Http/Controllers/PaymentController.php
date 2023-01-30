<?php

namespace App\Http\Controllers;
use PaytmWallet;




use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function register()
    {
        return view('register');
    }


    public function order(Request $request)
    {


        // $this->validate($request, [
        //     'name' => 'required',
        //     'mobile_no' => 'required|numeric|digits:10|unique:event_registration,mobile_no',
        //     'address' => 'required',
        // ]);


        $input = $request->all();
        $input['order_id'] = $request->mobile_no.rand(1,100);
        $input['fee'] = 50;


    


        $payment = PaytmWallet::with('receive');
        $payment->prepare([
          'order' => $input['order_id'],
          'user' => 'snhlrj5',
          'mobile_number' => '7979068408',
          'email' => 'snhlrj5@gmail.com',
          'amount' => $input['fee'],
          'callback_url' => url('api/payment/status')
        ]);

        $transaction = PaytmWallet::with('receive');
        // dd( $payment ,  $transaction);
        return $payment->receive();
    }


    /**
     * Obtain the payment information.
     *
     * @return Object
     */


     public function paymentCallback()
     {
         $transaction = PaytmWallet::with('receive');
 
 
         $response = $transaction->response();
         $order_id = $transaction->getOrderId();
 
 
         if($transaction->isSuccessful()){
           EventRegistration::where('order_id',$order_id)->update(['status'=>2, 'transaction_id'=>$transaction->getTransactionId()]);
 
 
           dd('Payment Successfully Paid.');
         }else if($transaction->isFailed()){
           EventRegistration::where('order_id',$order_id)->update(['status'=>1, 'transaction_id'=>$transaction->getTransactionId()]);
           dd('Payment Failed.');
         }
     }    
}
