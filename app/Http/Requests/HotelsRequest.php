<?php

namespace App\Http\Requests;


class HotelsRequest extends AppRequest
{
    const SCENARIO_UPLOAD = 4;
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
                'name' => 'required|max:255',
                'stars' => 'required|integer|min:0|max:5',
                'address' => 'required|max:255',
                'price' => 'required|numeric|min:0',
                'description' => 'required',
                'files' => 'required|array',
            ],
            self::SCENARIO_UPDATE => [
                'name' => 'required|max:255',
                'stars' => 'required|integer|min:0|max:5',
                'address' => 'required|max:255',
                'price' => 'required|numeric|min:0',
                'description' => 'required',
                'files' => 'required|array',
            ],
            self::SCENATIO_DEFAULT => [
                'id' => 'integer|nullable',
                'name' => 'string|nullable',
                'stars' => 'integer|nullable',
                'address' => 'string|nullable',
                'price' => 'numeric|nullable',
                'description' => 'string|nullable',
            ],
            self::SCENARIO_UPLOAD => [

            ],
        ];

        return $rules[$this->scenario]??$rules[self::SCENATIO_DEFAULT];
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
