<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransportMode;
use Illuminate\Support\Facades\Validator;

class TransportModeController extends Controller
{
    public function index(Request $request){
        return view('dashboard.transport_modes',[
            'results' => transportMode::all()
        ]);
    }

    public function enter(Request $request){
        $validator = Validator::make($request->all(), [
            'mode' => 'required|string',
            'amount' => 'required|numeric',
            'delivery' => 'required|numeric'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors());
        }

        TransportMode::create($request->all());
        return redirect()->back()->withSuccess('Transport Mode Added Successfully');

    }

    public function show($id){
        return view('dashboard.edit_mode',[
            'mode' => TransportMode::find($id)
        ]);
    }

    public function update(Request $request, $id){
        $mode = TransportMode::find($id);
        $mode->update($request->all());
        return redirect('transport_mode')->withSuccess('Transport Mode Updated Successfully');
    }

    public function destroy($id){
        TransportMode::find($id)->delete();
        return redirect('transport_mode')->withSuccess('Transport Mode Deleted Successfully');
    }
}
