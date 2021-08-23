<?php

namespace App\Http\Controllers;

use App\Models\Weight;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\TransportMode;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function preview(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'name' => 'required|string',
            'phone' => 'numeric|required',
            'item' => 'required|string',
            'address' => 'required|string',
            'country'=> 'required|string',
            'transport_mode' => 'required|string',
            'weight' => 'required|numeric'

        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors());
        }
        $weight = Weight::where('transport_mode_id',$request->transport_mode)->first();
        $country = Country::where('id',$request->country)->first();
        $mode = TransportMode::where('id',$request->transport_mode)->first();

        $input = $request->all();
        $input['country'] = $country->name;
        $input['country_price'] = $country->amount;
        $input['transport_mode'] = $mode->mode;
        $input['delivery'] = $mode->delivery;
        $input['mode_price'] = $mode->amount;
        $input['weight_price'] = $input['weight'] * $weight->amount;
        $input['tax'] = 0.3 * ($mode->amount + $country->amount + $input['weight_price']);
        $input['total'] = $input['tax'] + $mode->amount + $input['weight_price'] + $country->amount;
        $res = $input;
        return view('display', compact('res'));

    }
}
