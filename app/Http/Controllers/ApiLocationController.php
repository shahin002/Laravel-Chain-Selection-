<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use App\Models\Union;
use App\Models\Upazilla;
use Illuminate\Http\Request;

class ApiLocationController extends Controller
{
    public function getDivisions()
    {
        return response()->json(Division::select('id as value','name as label')->get());

    }
    public function getDistricts(Request $request)
    {
        return response()->json(District::select('id as value','name as label','division_id')->where('division_id',$request->division_id)->get());

    }
    public function getUpazillas(Request $request)
    {
        return response()->json(Upazilla::select('id as value','name as label','district_id')->where('district_id',$request->district_id)->get());

    }
    public function getUnions(Request $request)
    {
        return response()->json(Union::select('id as value','name as label','upazilla_id')->where('upazilla_id',$request->upazilla_id)->get());

    }
}
