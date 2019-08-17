<?php

namespace App\Http\Requests;


use Illuminate\Support\Facades\DB;

class HotelSearchRequest extends AppRequest
{
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
        return [
            'h_address' => 'required',
            'h_departure_date' => 'required|date_format:d/m/Y|after_or_equal:today',
            'h_return_date' => 'required|date_format:d/m/Y|after_or_equal:departure_date',
            'h_capacity' => 'sometimes|integer|min:1|max:10|nullable',
        ];
    }

    public function attributes()
    {
        return [
            'h_address' => 'City',
            'h_departure_date' => 'Departure',
            'h_return_date' => 'Return',
            'h_capacity' => 'Rooms',
        ];
    }

    public function addFilter(&$query)
    {

        $departure_date = $this->convertDate($this->h_departure_date);
        $return_date = $this->convertDate($this->h_return_date);

        $query->where('hotels.address','like',"%{$this->h_address}%");

        if($this->h_capacity)
            $query->where(['hotel_rooms.capacity' => $this->h_capacity]);


        //filter only rooms which not registered
        $sql = Db::raw('IFNULL(sum( (hotel_room_books.departure_date BETWEEN ? AND ?)
                                or (hotel_room_books.return_date BETWEEN ? AND ?) ),0) = 0');

        $query->havingRaw($sql,[$departure_date, $return_date, $departure_date, $return_date]);


    }

    protected function convertDate($date){
        $myDateTime = \DateTime::createFromFormat('d/m/Y', $date);
        return $myDateTime->format('Y-m-d');
    }
}
