<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;

class Flights extends Model
{
    use Sortable,Notifiable;


    protected $guarded = ['id','created_at','updated_at'];


    public $sortable = ['id','company_name','type','finish_date','price','destination','start_location','count_passenger'];

    public function getFinishDateAttribute($value){
        return $value?date('Y-m-d H:i',strtotime($value)):null;
    }
}
