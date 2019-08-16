<?php

namespace App\Http\Requests;


use Carbon\Carbon;
use function foo\func;

class FlightSearchRequest extends AppRequest
{

    public $paginate = 1;
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
            'start_location' => 'required',
            'destination' =>'required',
            'departure_date' => 'required|date_format:d/m/Y|after_or_equal:today',
            'return_date' => 'sometimes|date_format:d/m/Y|after_or_equal:departure_date|nullable',
            'count_passenger' => 'sometimes|integer|min:1|max:10|nullable',
        ];
    }

    public function attributes()
    {
        return [
            'start_location' => 'Start location',
            'destination' =>'Destination',
            'departure_date' => 'Departure date',
            'return_date' => 'Return date',
            'count_passenger' => 'Adults',
        ];
    }

    public function addFilter(&$query)
    {

        if(isset($this->count_passenger)){
            $query->where('count_passenger' ,'>=', $this->count_passenger);
        }

        if(isset($this->return_date)){
            $query->where(function ($query){
                $query->where('start_location' ,'LIKE', "%$this->start_location%")
                    ->where('destination' ,'LIKE', "%$this->destination%")
                    ->where('departure_date' ,'LIKE', $this->convertDate($this->departure_date)."%");
            })->orWhere(function ($query){
                $query->where('start_location' ,'LIKE', "%$this->destination%")
                    ->where('destination' ,'LIKE', "%$this->start_location%")
                    ->where('departure_date' ,'LIKE', $this->convertDate($this->return_date)."%");
            });
        } else {
            $query->where('start_location' ,'LIKE', "%$this->start_location%")
                ->where('destination' ,'LIKE', "%$this->destination%")
                ->where('departure_date' ,'LIKE', $this->convertDate($this->departure_date)."%");
        }



        //dd($query->toSql());
    }

    protected function convertDate($date){
        $myDateTime = \DateTime::createFromFormat('d/m/Y', $date);
        return $myDateTime->format('Y-m-d');
    }


}
