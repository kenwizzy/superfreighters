<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weight;
use App\Models\TransportMode;
use Illuminate\Support\Facades\Validator;

class WeightController extends Controller
{
    public function index(Request $request){
        return view('dashboard.weights',[
            'results' => Weight::all(),
            'transport_mode' => TransportMode::all()
        ]);
    }

    public function enterweight(Request $request){
        $validator = Validator::make($request->all(), [
            'transport_mode_id' => 'required|numeric',
            'amount' => 'required|numeric'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors());
        }

        Weight::create($request->all());
        return redirect()->back()->withSuccess('Weight Added Successfully');

    }

    public function show($id){
        return view('dashboard.edit_weight',[
            'weight' => Weight::find($id)
        ]);
    }

    public function update(Request $request, $id){
        $mode = Weight::find($id);
        $mode->update($request->all());
        return redirect('weights')->withSuccess('Weight Updated Successfully');
    }

    public function destroy($id){
        Weight::find($id)->delete();
        return redirect('weights')->withSuccess('Weight Deleted Successfully');
    }
}
