<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelImages extends Model
{
    const FOLDER = "hotels";
    protected $fillable = ['img','hotel_id'];


    public function getUrlAttribute(){
        return env('APP_STORAGE_URL').self::FOLDER."/".$this->img;
    }

    public static function url($img){
        return env('APP_STORAGE_URL').self::FOLDER."/".$img;
    }
}
