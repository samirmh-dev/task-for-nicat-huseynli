<?php

namespace App\Http\Requests;


use App\HotelRooms;
use Illuminate\Validation\Rule;

class HotelRoomBookRequest extends AppRequest
{
    protected $activeBooks = [];
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->scenario){
            case self::SCENARIO_INSERT:
                $room = HotelRooms::find($this->hotel_room_id);
                $this->activeBooks = $room->activeBooks;
                return [
                    'hotel_room_id' => ['required','integer',function($attr, $value, $fail) use ($room){
                        if(!isset($room->id) || $room->hotel_id != $this->hotel->id){
                            $fail($this->attributes()[$attr].' is invalid.');
                        }
                    }],
                    'departure_date' => ['required','date_format:Y-m-d','after:today',function($attr,$value,$fail){
                        return $this->checkBooks($attr,$value,$fail);
                    }],
                    'return_date' => ['required','date_format:Y-m-d','after_or_equal:departure_date',function($attr, $value, $fail) {
                        return $this->checkBooks($attr,$value,$fail);
                    }],
                ];
            case self::SCENARIO_UPDATE:
                $room = HotelRooms::find($this->hotel_room_id);
                $this->activeBooks = $room->activeBooks;
                return [
                    'hotel_room_id' => ['required','integer',function($attr, $value, $fail) use ($room) {
                        if(!isset($room->id) || $room->hotel_id != $this->hotel->id){
                            $fail($this->attributes()[$attr].' is invalid.');
                        }
                    }],
                    'departure_date' => ['required','date_format:Y-m-d','after:today',function($attr,$value,$fail){
                        return $this->checkBooks($attr,$value,$fail);
                    }],
                    'return_date' => ['required','date_format:Y-m-d','after_or_equal:departure_date',function($attr, $value, $fail) {
                        return $this->checkBooks($attr,$value,$fail);
                    }],
                ];
            default:
                return [
                    'id' => 'integer|nullable',
                    'hotel_room_id' => 'integer|nullable',
                    'departure_date' => 'string|nullable',
                    'return_date' => 'string|nullable',
                ];

        }
    }

    public function attributes()
    {
        return [
            'id' => '№',
            'hotel_room_id' => 'Otaq nömrəsi',
            'departure_date' => 'Başlanğıç tarixi',
            'return_date' => 'Bitiş tarixi',
            'hotel' => 'Otelin adı',
            'created_at' => 'Yaradılma tarixi',
            'updated_at' => 'Son yenilənmə tarixi',
        ];
    }


    protected function addFilter(&$query)
    {
        $filters = $this->validated();
        if(isset($filters['id'])){
            $query->where(['hotel_room_books.id' => $filters['id']]);
        }
        if(isset($filters['hotel_room_id'])){
            $query->where(['hotel_rooms.number' => $filters['hotel_room_id']]);
        }
        if(isset($filters['departure_date'])){
            $query->where('departure_date', 'LIKE',"%{$filters['departure_date']}%");
        }
        if(isset($filters['return_date'])){
            $query->where('return_date', 'LIKE',"%{$filters['return_date']}%");
        }

    }

    protected function checkBooks($attr, $value, $fail){
        $date = strtotime($value);
        foreach ($this->activeBooks as $book){
            $departure_date = strtotime($book->departure_date);
            $return_date = strtotime($book->return_date);
            //if the model is new or the model and $book are different begin check
            if($this->scenario == self::SCENARIO_INSERT || $this->book->id != $book->id){
                //if this model departure_date or return_date is between $book->departure_date and $book->return date  then deny allow update
                if($departure_date <= $date && $return_date >= $date){
                    $fail("($value) tarixində bu otaq qeydiyyata salına bilməz. ({$book->departure_date}) - ({$book->return_date}) tarix aralığında bu otaq doludur.");
                    break;
                }

                //if $model->departure_date =< $book->departure_date and $model->return_date >= $book->return date  then deny allow update
                if($attr == 'return_date'){
                    if($departure_date >= strtotime($this->departure_date) && $return_date<= $date){
                        $fail("($this->departure_date) - ($value) tarix aralığında bu otaq qeydiyyata salına bilməz. ({$book->departure_date}) - ({$book->return_date}) tarix aralığında bu otaq doludur.");
                        break;
                    }
                }
            }

        }
    }

}
