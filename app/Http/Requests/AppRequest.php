<?php

namespace App\Http\Requests;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Http\FormRequest;

class AppRequest extends FormRequest
{
    const SCENATIO_DEFAULT = 0;
    const SCENARIO_INSERT = 1;
    const SCENARIO_UPDATE = 2;
    const SCENARIO_DELETE = 3;

    public $scenario = self::SCENARIO_INSERT;


    public $paginate = 20;




    protected $rules = [];

    public function getValidatorInstance()
    {
        switch ($this->method()){
            case self::METHOD_POST:
                $this->scenario = self::SCENARIO_INSERT;
                break;
            case self::METHOD_PUT:
            case self::METHOD_PATCH:
                $this->scenario = self::SCENARIO_UPDATE;
                break;
            case self::METHOD_DELETE:
                $this->scenario = self::SCENARIO_DELETE;
                break;
            default:
                $this->scenario = self::SCENATIO_DEFAULT;
                break;
        }

        return parent::getValidatorInstance(); // TODO: Change the autogenerated stub
    }

    public function search($query){
        if(!($query instanceof Builder)){
            abort('500','`$query` must be intance of '.Builder::class);
        }
        $rules = $this->validator->getRules();

        $filters = $this->validated();
        foreach ($rules as $attr => $rule){
            if(in_array('string',$rule) && !empty($filters[$attr])){
                $query->where($attr, 'LIKE',"%{$filters[$attr]}%");
            } elseif(isset($filters[$attr]) && $filters[$attr] != null) {
                $query->where([$attr => $filters[$attr]]);
            }
        }
        return $query->sortable()->paginate($this->paginate)->appends($filters);
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return $this->rules;
    }

    protected function scenario($scene){
        $this->scenario = $scene;
    }
}