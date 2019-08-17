<?php

namespace App\Http\Controllers;

use App\Flights;
use App\Hotels;
use App\Http\Requests\FlightSearchRequest;
use App\Http\Requests\HotelSearchRequest;

class HomeController extends Controller
{
    public function index(){
        return view('frontend.home.index');
    }

    public function searchFlight(FlightSearchRequest $request){
        $query = Flights::query()->orderBy('price','ASC');
        $models = $request->search($query);

        return view('frontend.home.flight',['models' => $models,'request' => $request]);
    }


    public function searchHotel(HotelSearchRequest $request){
        $query = Hotels::query()->select('hotels.*')
                    ->join('hotel_rooms','hotels.id','=','hotel_rooms.hotel_id')
                    ->leftJoin('hotel_room_books','hotel_rooms.id','=','hotel_room_books.hotel_room_id')
                    ->groupBy('hotels.id');

        $models = $request->search($query);
        return view('frontend.home.hotel',['models' => $models]);
    }
}
