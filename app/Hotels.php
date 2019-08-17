<?php

namespace App;

use App\Http\Requests\HotelsRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;

class Hotels extends Model
{
    use Sortable,Notifiable;

    const SERVICES = ['wifi','bar','air_conditioner', 'restaurant', 'gym', 'room_service', 'cafe'];

    public $guarded = ['id','created_at','updated_at','files','roomNumbers'];

    public $sortable = ['id','name','stars','address','price'];

    protected $casts = [
        'wifi' => 'boolean',
        'bar' => 'boolean',
        'air_conditioner' => 'boolean',
        'restaurant' => 'boolean',
        'gym' => 'boolean',
        'room_service' => 'boolean',
        'cafe' => 'boolean',
    ];


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

    public function getServicesAttribute(){
        $result = '';
        foreach (self::SERVICES as $serviceName){
            if($this->{$serviceName})
                $result .= '<i class="fa fa-check" aria-hidden="true"></i>&nbsp;'.$serviceName.'<br>';
        }
        return $result;
    }

    public function getServicesWithIconAttribute(){
        $icons = [
            'wifi' => 'icon-wifi-full',
            'bar' => 'icon-glass',
            'air_conditioner' => 'icon-line-shuffle',
            'restaurant' => 'icon-food',
            'gym' => 'noborder i-light icon-barbell',
            'room_service' => 'icon-bell',
            'cafe' => 'noborder i-light icon-coffee2',
        ];
        $result = '';
        $attributes = (new HotelsRequest())->attributes();
        foreach (self::SERVICES as $serviceName){
            if($this->{$serviceName})
                $result .= '<i class="i-rounded i-small i-bordered '.(@$icons[$serviceName]).'"  data-toggle="tooltip" data-placement="top" title="'.(@$attributes[$serviceName]).'"></i>';
        }
        return $result;
    }
}
