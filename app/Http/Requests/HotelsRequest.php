<?php

namespace App\Http\Requests;


class HotelsRequest extends AppRequest
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
                    'name' => 'required|max:255',
                    'stars' => 'required|integer|min:0|max:5',
                    'address' => 'required|max:255',
                    'price' => 'required|numeric|min:0',
                    'description' => 'required',
                    'files' => 'required|array',
                    'wifi' => 'boolean|nullable',
                    'bar' => 'boolean|nullable',
                    'air_conditioner' => 'boolean|nullable',
                    'restaurant' => 'boolean|nullable',
                    'gym' => 'boolean|nullable',
                    'room_service' => 'boolean|nullable',
                    'cafe' => 'boolean|nullable',
                ];
            case self::SCENARIO_UPDATE:
                return [
                    'name' => 'required|max:255',
                    'stars' => 'required|integer|min:0|max:5',
                    'address' => 'required|max:255',
                    'price' => 'required|numeric|min:0',
                    'description' => 'required',
                    'files' => 'required|array',
                    'wifi' => 'boolean|nullable',
                    'bar' => 'boolean|nullable',
                    'air_conditioner' => 'boolean|nullable',
                    'restaurant' => 'boolean|nullable',
                    'gym' => 'boolean|nullable',
                    'room_service' => 'boolean|nullable',
                    'cafe' => 'boolean|nullable',
                ];
            default:
                return [
                    'id' => 'integer|nullable',
                    'name' => 'string|nullable',
                    'stars' => 'integer|nullable',
                    'address' => 'string|nullable',
                    'price' => 'numeric|nullable',
                    'description' => 'string|nullable',
                ];

        }
    }

    public function attributes()
    {
        return [
            'id' => '№',
            'name' => 'Otelin adı',
            'stars' => 'Ulduz sayı',
            'address' =>'Ünvan',
            'price' => 'Qiymət',
            'description' => 'Qısa məzmun',
            'files' => 'Şəkillər',
            'services' => 'Xidmətlər',
            'wifi' => 'Wifi',
            'bar' => 'Bar',
            'air_conditioner' => 'Kondisioner',
            'restaurant' => 'Restoran',
            'gym' => 'İdman mərkəzi',
            'room_service' => 'Otaq xidməti',
            'cafe' => 'Kafe',
            'created_at' => 'Yaradılma tarixi',
            'updated_at' => 'Son yenilənmə tarixi',
        ];
    }
}
