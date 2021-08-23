<?php

namespace App\Http\Controllers;

use Paystack;
use Carbon\Carbon;
use App\Models\User;
use App\Notifications\OrderNotification;
use App\Notifications\AdminNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
//use App\Mail\OrderNotification;
use App\Models\Order;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();
        //dd($paymentDetails);
        if($paymentDetails['status'] == true && $paymentDetails['data']['status'] == 'success'){
            $order = new Order();
            $order->name = $paymentDetails['data']['metadata']['name'];
            $order->email = $paymentDetails['data']['customer']['email'];
            $order->reference = $paymentDetails['data']['reference'];
            $order->phone_number = $paymentDetails['data']['metadata']['phone'];
            $order->address = $paymentDetails['data']['metadata']['address'];
            $order->transport_mode = $paymentDetails['data']['metadata']['transport_mode'];
            $order->country = $paymentDetails['data']['metadata']['country'];
            $order->status = 'Paid';
            $order->weight = $paymentDetails['data']['metadata']['weight'];
            $order->item = $paymentDetails['data']['metadata']['item'];
            $order->weight_price = $paymentDetails['data']['metadata']['weight_price'];
            $order->country_price = $paymentDetails['data']['metadata']['country_price'];
            $order->mode_price = $paymentDetails['data']['metadata']['mode_price'];
            $order->delivery = $paymentDetails['data']['metadata']['delivery'];
            $order->shipping_day = Carbon::now()->addDay(1)->isoFormat('MMMM Do YYYY');
            $order->tax = $paymentDetails['data']['metadata']['tax'];
            $order->total_amount = $paymentDetails['data']['metadata']['total'];
            $order->save();
            Notification::route('mail', $paymentDetails['data']['customer']['email'])->notify(new OrderNotification($order));
            $user = User::find(1)->first();
            $user->notify(new AdminNotification($user));
            
            return redirect('/')->withSuccess('Thank you for patronizing us. Kindly check your mail for more info');

        }
    }
}
