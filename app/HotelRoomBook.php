<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;

class HotelRoomBook extends Model
{
    use Sortable,Notifiable;

    protected $guarded = ['id','created_at','updated_at'];

    public $sortable = ['id','departure_date','return_date','created_at'];

    public function room(){
        return $this->belongsTo(HotelRooms::class,'hotel_room_id','id');
    }

}
