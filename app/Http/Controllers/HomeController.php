<?php

namespace App\Http\Controllers;

use App\Flights;
use App\Http\Requests\FlightSearchRequest;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('frontend.home.index');
    }

    public function searchFlight(FlightSearchRequest $request){
        $query = Flights::query();
        $models = $request->search($query);

        return view('frontend.home.search',['models' => $models,'request' => $request]);
    }
}
