<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;

class Hotels extends Model
{
    use Sortable,Notifiable;

    public $guarded = ['id','created_at','updated_at','files','roomNumbers'];

    public $sortable = ['id','name','stars','address','price'];

    public function images(){
        return $this->hasMany(HotelImages::class,'hotel_id','id');
    }

    public function rooms(){
        return $this->hasMany(HotelRooms::class,'hotel_id','id');
    }

    public function getRoomNumbersAttribute(){
        return HotelRooms::where(['hotel_id' => $this->id])->orderBy("number")->pluck('number','id');
    }

    public function getRoomListAttribute(){
        return HotelRooms::where(['hotel_id' => $this->id])->pluck('id');
    }
}
