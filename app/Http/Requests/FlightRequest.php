<?php

namespace App\Http\Requests;


class FlightRequest extends AppRequest
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
        $rules = [
            self::SCENARIO_INSERT => [
                'company_name' => 'required|max:255',
                'type' => 'required|max:255',
                'finish_date' =>'required|date_format:Y-m-d H:i',
                'price' => 'required|numeric|min:0',
                'destination' => 'required|max:255',
                'start_location' => 'required|max:255',
                'count_passenger' => 'required|integer|min:0',
                'description' => 'required',
            ],
            self::SCENARIO_UPDATE => [
                'company_name' => 'required|max:255',
                'type' => 'required|max:255',
                'finish_date' =>'required|date_format:Y-m-d H:i',
                'price' => 'required|numeric|min:0',
                'destination' => 'required|max:255',
                'start_location' => 'required|max:255',
                'count_passenger' => 'required|integer|min:0',
                'description' => 'required',
            ],
            self::SCENATIO_DEFAULT => [
                'id' => 'integer|nullable',
                'company_name' => 'string|nullable',
                'type' => 'string|nullable',
                'finish_date' =>'string|nullable',
                'price' => 'numeric|nullable',
                'destination' => 'string|nullable',
                'start_location' => 'string|nullable',
                'count_passenger' => 'integer|nullable',
                'description' => 'string|nullable',
            ]
        ];
        return $rules[$this->scenario]??$rules[self::SCENATIO_DEFAULT];
    }

    public function attributes()
    {
        return [
            'id' => '№',
            'company_name' => 'Şirkətin adı',
            'type' => 'Təyyarənin tipi ',
            'finish_date' =>'Təxmini eniş tarixi',
            'price' => 'Qiymət',
            'destination' => 'Təyinat nöqtəsi',
            'start_location' => 'Çıxış nöqtəsi',
            'count_passenger' => 'İnsan sayı',
            'description' => 'Qısa məzmun',
            'created_at' => 'Yaradılma tarixi',
            'updated_at' => 'Son yenilənmə tarixi',
        ];
    }
}
