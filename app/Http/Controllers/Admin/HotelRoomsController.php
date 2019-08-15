<?php

namespace App\Http\Controllers\Admin;

use App\HotelRooms;
use App\Hotels;
use App\Http\Controllers\Controller;
use App\Http\Requests\HotelRoomsRequest;
use Illuminate\Http\Request;

class HotelRoomsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(HotelRoomsRequest $request, Hotels $hotel)
    {
        $query = HotelRooms::query()->where(['hotel_id' => $hotel->id]);
        if(!$request->get('sort')){
            $query->orderBy('number','asc');
        }

        $models = $request->search($query);
        return view('admin.hotels.rooms.index',['hotel' => $hotel, 'models' => $models,'attributes' => $request->attributes()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(HotelRoomsRequest $request,Hotels $hotel)
    {
        $request->scenario = HotelRoomsRequest::SCENARIO_INSERT;
        $model = new HotelRooms(['hotel_id' => $hotel->id]);
        return view('admin.hotels.rooms.create',['hotel' => $hotel,'model' => $model,'request' =>$request]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HotelRoomsRequest $request,Hotels $hotel)
    {
        $data = $request->validated();
        $data['hotel_id'] =$hotel->id;
        $model = HotelRooms::create($data);

        return redirect("/hotels/{$hotel->id}/rooms/{$model->id}");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HotelRooms  $hotelRooms
     * @return \Illuminate\Http\Response
     */
    public function show(Hotels $hotel, HotelRooms $room)
    {
        return view('admin.hotels.rooms.show',['hotel' => $hotel,'model' => $room]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HotelRooms  $hotelRooms
     * @return \Illuminate\Http\Response
     */
    public function edit(HotelRoomsRequest $request,Hotels $hotel, HotelRooms $room)
    {
        $request->scenario = HotelRoomsRequest::SCENARIO_UPDATE;
        return view('admin.hotels.rooms.edit',['hotel' => $hotel, 'model' => $room,'request' => $request]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HotelRooms  $hotelRooms
     * @return \Illuminate\Http\Response
     */
    public function update(HotelRoomsRequest $request,Hotels $hotel, HotelRooms $room)
    {
        $data = $request->validated();
        $room->update($data);

        return redirect("hotels/{$hotel->id}/rooms/{$room->id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HotelRooms  $hotelRooms
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotels $hotel,HotelRooms $room)
    {
        $room->delete();
        return redirect("/hotels/{$hotel->id}/rooms");
    }
}
