<?php

namespace App\Http\Controllers\Admin;

use App\Flights;
use App\Http\Requests\FlightRequest;
use App\Http\Requests\SliderRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FlightsController extends Controller
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
    public function index(FlightRequest $request)
    {
        $query = Flights::query();
        if(!$request->get('sort')){
            $query->orderBy('created_at','desc');
        }

        $models = $request->search($query);
        return view('admin.flights.index',['models' => $models,'attributes' => $request->attributes()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FlightRequest $request)
    {
        $model = new Flights();
        $request->scenario = FlightRequest::SCENARIO_INSERT;

        return view('admin.flights.create',['model' => $model,'request' => $request]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FlightRequest $request)
    {
        $data = $request->validated();
        $model = Flights::create($data);

        return redirect('flights/'.$model->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Flights  $flights
     * @return \Illuminate\Http\Response
     */
    public function show(Flights $flight)
    {
        return view('admin.flights.show',['model' => $flight]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Flights  $flights
     * @return \Illuminate\Http\Response
     */
    public function edit(FlightRequest $request, Flights $flight)
    {
        $request->scenario = FlightRequest::SCENARIO_UPDATE;
        return view('admin.flights.edit',['model' => $flight,'request' => $request]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Flights  $flights
     * @return \Illuminate\Http\Response
     */
    public function update(FlightRequest $request, Flights $flight)
    {
        $request->scenario = FlightRequest::SCENARIO_UPDATE;
        $data = $request->validated();
        $flight->update($data);
        return redirect("flights/{$flight->id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Flights  $flights
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flights $flight)
    {
        $flight->delete();
        return redirect("/flights");
    }
}
