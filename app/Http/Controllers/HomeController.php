<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = array();
        $data['divisions']=Division::select(['id','name'])->get();

        return view('welcome')->with($data);
    }
}
