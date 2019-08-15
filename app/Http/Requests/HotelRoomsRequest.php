<?php

namespace App\Http\Requests;



use Illuminate\Validation\Rule;

class HotelRoomsRequest extends AppRequest
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
        switch ($this->scenario){
            case self::SCENARIO_INSERT:
                return [
                    'number' => ['required','integer','min:1', Rule::unique('hotel_rooms')->where(function($query){
                        return $query->whereHotelId($this->hotel->id);
                    })],
                    'floor' => 'required|integer|min:0',
                    'capacity' => 'required|integer|min:1',
                ];
            case self::SCENARIO_UPDATE:
                return [
                    'number' => ['required','integer','min:1', Rule::unique('hotel_rooms')->where(function($query){
                        return $query->whereHotelId($this->hotel->id);
                    })->ignore($this->room->id)],
                    'floor' => 'required|integer|min:0',
                    'capacity' => 'required|integer|min:1',
                ];
            default:
                return [
                    'id' => 'integer|nullable',
                    'number' => 'integer|nullable',
                    'floor' => 'integer|nullable',
                    'capacity' => 'integer|nullable',
                ];

        }
    }

    public function attributes()
    {
        return [
            'id' => '№',
            'hotel_id' => 'Otel',
            'number' => 'Otaq nömrəsi',
            'floor' => 'Mərtəbə',
            'capacity' => 'Tutum',
            'created_at' => 'Yaradılma tarixi',
            'updated_at' => 'Son yenilənmə tarixi',
        ];
    }

}
