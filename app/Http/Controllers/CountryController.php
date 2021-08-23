<?php

namespace App\Http\Controllers;
use App\Models\Country;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(Request $request){
        return view('dashboard.countries',[
            'results' => Country::all()
        ]);
    }

    public function enterCountry(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'amount' => 'required|numeric'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors());
        }

        Country::create($request->all());
        return redirect()->back()->withSuccess('Country Added Successfully');

    }

    public function show($id){
        return view('dashboard.edit_country',[
            'country' => Country::find($id)
        ]);
    }

    public function update(Request $request, $id){
        $country = Country::find($id);
        $country->update($request->all());
        return redirect('countries')->withSuccess('Country Updated Successfully');
    }

    public function destroy($id){
        Country::find($id)->delete();
        return redirect('countries')->withSuccess('Country Deleted Successfully');
    }
}
