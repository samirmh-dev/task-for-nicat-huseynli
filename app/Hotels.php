<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;

class Hotels extends Model
{
    use Sortable,Notifiable;

    public $guarded = ['id','created_at','updated_at','files'];

    public $sortable = ['id','name','stars','address','price'];

    public function images(){
        return $this->hasMany(HotelImages::class,'hotel_id','id');
    }
}
