<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;

class HotelRooms extends Model
{
    use Sortable, Notifiable;

    public $guarded = ['id','created_at','updated_at'];

    public $sortable = ['id','number','floor','capacity'];

    public function activeBooks(){
        return $this->hasMany(HotelRoomBook::class,'hotel_room_id','id')
                        ->where('departure_date','>',date('Y-m-d'));
    }
}
