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
                ];
            case self::SCENARIO_UPDATE:
                return [
                    'name' => 'required|max:255',
                    'stars' => 'required|integer|min:0|max:5',
                    'address' => 'required|max:255',
                    'price' => 'required|numeric|min:0',
                    'description' => 'required',
                    'files' => 'required|array',
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
            'created_at' => 'Yaradılma tarixi',
            'updated_at' => 'Son yenilənmə tarixi',
        ];
    }
}
