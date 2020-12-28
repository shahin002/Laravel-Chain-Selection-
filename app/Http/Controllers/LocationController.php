<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use App\Models\Union;
use App\Models\Upazilla;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function getDivisions()
    {
        return response()->json(Division::all()->pluck('name','id'));

    }
    public function getDistricts(Request $request)
    {
        return response()->json(District::where('division_id',$request->division_id)->get()->pluck('name','id'));

    }
    public function getUpazillas(Request $request)
    {
        return response()->json(Upazilla::where('district_id',$request->district_id)->get()->pluck('name','id'));

    }
    public function getUnions(Request $request)
    {
        return response()->json(Union::where('upazilla_id',$request->upazilla_id)->get()->pluck('name','id'));

    }
}
