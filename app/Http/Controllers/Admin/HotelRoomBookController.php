<?php

namespace App\Http\Controllers\Admin;

use App\HotelRoomBook;
use App\Hotels;
use App\Http\Requests\HotelRoomBookRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HotelRoomBookController extends Controller
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
    public function index(HotelRoomBookRequest $request, Hotels $hotel)
    {
        $query = HotelRoomBook::query()
                    ->select('hotel_room_books.*')
                    ->leftJoin('hotel_rooms','hotel_room_books.hotel_room_id','=','hotel_rooms.id')
                    ->leftJoin('hotels','hotel_rooms.hotel_id','=','hotels.id')->distinct();

        if(!$request->get('sort')){
            $query->orderBy('hotel_room_books.created_at','desc');
        }

        $models = $request->search($query);
        return view('admin.hotels.books.index',['hotel' => $hotel, 'models' => $models,'attributes' => $request->attributes()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(HotelRoomBookRequest $request,Hotels $hotel)
    {
        $request->scenario = HotelRoomBookRequest::SCENARIO_INSERT;
        $model = new HotelRoomBook();
        return view('admin.hotels.books.create',['hotel' => $hotel,'model' => $model,'request' =>$request]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HotelRoomBookRequest $request,Hotels $hotel)
    {
        $data = $request->validated();
        $model = HotelRoomBook::create($data);

        return redirect("/hotels/{$hotel->id}/books/{$model->id}");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HotelRoomBook  $hotelRoomBook
     * @return \Illuminate\Http\Response
     */
    public function show(Hotels $hotel, HotelRoomBook $book)
    {
        return view('admin.hotels.rooms.show',['hotel' => $hotel,'model' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HotelRoomBook  $hotelRoomBook
     * @return \Illuminate\Http\Response
     */
    public function edit(HotelRoomBookRequest $request, Hotels $hotel, HotelRoomBook $book)
    {
        $request->scenario = HotelRoomBookRequest::SCENARIO_UPDATE;
        return view('admin.hotels.books.edit',['hotel' => $hotel, 'model' => $book,'request' => $request]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HotelRoomBook  $hotelRoomBook
     * @return \Illuminate\Http\Response
     */
    public function update(HotelRoomBookRequest $request, Hotels $hotel, HotelRoomBook $book)
    {
        $data = $request->validated();
        $book->update($data);

        return redirect("hotels/{$hotel->id}/books/{$book->id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HotelRoomBook  $hotelRoomBook
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotels $hotel,HotelRoomBook $book)
    {
        $book->delete();
        return redirect("/hotels/{$hotel->id}/books");
    }
}
