<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use KingFlamez\Rave\Facades\Rave as Flutterwave;

class FlutterwaveController extends Controller
{
    /**
     * Initialize Rave payment process
     * @return void
     */
    public function initialize(Request $request)
    {
        //This generates a payment reference
        $reference = Flutterwave::generateReference();
         $input = $request->all();
        // Enter the details of the payment
        $data = [
            'payment_options' => 'card,banktransfer',
            'amount' => request()->amount,
            'address' => request()->address,
            'email' => request()->email,
            'tx_ref' => $reference,
            'currency' => "NGN",
            'redirect_url' => route('callback'),
            'customer' => [
                'email' => request()->email,
                "phone_number" => request()->phone,
                "name" => request()->name,
                "address" => request()->address,
                'country' => request()->country,
            ],

            'shippingDetails' => [
                'address' => request()->address,
                'item_name' =>request()->item,
                'transport_mode' => request()->transport_mode,
                'country' => request()->country,
                'weight' => request()->country,
                'tax' => request()->tax,
                'total' => request()->total
            ],
        ];

        $payment = Flutterwave::initializePayment($data,$input);


        if ($payment['status'] !== 'success') {
            // notify something went wrong
            return;
        }

        return redirect($payment['data']['link']);
    }

    /**
     * Obtain Rave callback information
     * @return void
     */
    public function callback(Request $request)
    {

        $status = request()->status;

        //if payment is successful
        if ($status ==  'successful') {

        $transactionID = Flutterwave::getTransactionIDFromCallback();
        $data = Flutterwave::verifyTransaction($transactionID);
        dd($request->all());
        dd($data);

        return redirect('/');

        }
        elseif ($status ==  'cancelled'){
            //Put desired action/code after transaction has been cancelled here
        }
        else{
            //Put desired action/code after transaction has failed here
        }
        // Get the transaction from your DB using the transaction reference (txref)
        // Check if you have previously given value for the transaction. If you have, redirect to your successpage else, continue
        // Confirm that the currency on your db transaction is equal to the returned currency
        // Confirm that the db transaction amount is equal to the returned amount
        // Update the db transaction record (including parameters that didn't exist before the transaction is completed. for audit purpose)
        // Give value for the transaction
        // Update the transaction to note that you have given value for the transaction
        // You can also redirect to your success page from here

    }
}
