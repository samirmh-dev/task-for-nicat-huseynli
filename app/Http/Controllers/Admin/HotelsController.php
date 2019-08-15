<?php

namespace App\Http\Controllers\Admin;

use App\HotelImages;
use App\Hotels;
use App\Http\Controllers\Controller;
use App\Http\Requests\HotelsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HotelsController extends Controller
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
    public function index(HotelsRequest $request)
    {
        $query = Hotels::query();
        if(!$request->get('sort')){
            $query->orderBy('created_at','desc');
        }

        $models = $request->search($query);
        return view('admin.hotels.index',['models' => $models,'attributes' => $request->attributes()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(HotelsRequest $request)
    {
        $model = new Hotels();
        $request->scenario = HotelsRequest::SCENARIO_INSERT;

        return view('admin.hotels.create',['model' => $model,'request' => $request]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HotelsRequest $request)
    {
        $data = $request->validated();

        $model = Hotels::create($data);

        //create images for this model
        foreach ($data['files'] as $img){
            HotelImages::create([
                'img' => $img,
                'hotel_id' => $model->id,
            ]);
        }

        return redirect('hotels/'.$model->id);
    }

    public function uploadImage(Request $request){
        //validate request
        $request->validate([
            'file' => 'file|image|max:5000',
        ]);

        // store file and return file name
        return ltrim($request->file('file')->store(HotelImages::FOLDER,'public'),HotelImages::FOLDER.'/');
    }

    public function removeImage(Request $request){
        //validate requeset
        $data = $request->validate([
            'filename' => 'required',
            'id' => 'integer|nullable',
        ]);
        //if exists id find the model and delete it
        if($data['id']){
            HotelImages::where(['hotel_id'=>$data['id'],'img'=>$data['filename']])->delete();
        }
        //delete file and return result of action
        echo Storage::delete('public/'.HotelImages::FOLDER.'/'.$data['filename']);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Hotels  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotels $hotel)
    {
        return view('admin.hotels.show',['model' => $hotel]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hotels  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(HotelsRequest $request,Hotels $hotel)
    {
        $request->scenario = HotelsRequest::SCENARIO_UPDATE;
        return view('admin.hotels.edit',['model' => $hotel,'request' => $request]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hotels  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(HotelsRequest $request, Hotels $hotel)
    {
        $data = $request->validated();

        // get old images
        $oldImgs = array_column($hotel->images->toArray(),'img');

        //get new images
        $newImgs = $data['files'];

        //add new images if it is exist
        $added = array_diff($newImgs,$oldImgs);

        foreach ($added as $img){
            HotelImages::create([
                'img' => $img,
                'hotel_id' => $hotel->id,
            ]);
        }

        // find delete images and delete those
        $deleted = array_diff($oldImgs,$newImgs);
        if($deleted){
            HotelImages::where(['hotel_id' => $hotel->id])->whereIn('img',$deleted)->delete();
        }


        $hotel->update($data);
        return redirect("hotels/{$hotel->id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hotels  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotels $hotel)
    {
        //get names of images
        $imgs =  array_column($hotel->images->toArray(),'img');

        //add paths
        $imgs = array_map(function($q){
            return 'public/'.HotelImages::FOLDER.'/'.$q;
        },$imgs);

        //delete model
        $hotel->delete();

        //delete images
        if($imgs){
            Storage::delete($imgs);
        }

        return redirect('/hotels');
    }
}
