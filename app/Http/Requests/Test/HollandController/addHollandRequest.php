<?php

namespace App\Http\Requests\Test\HollandController;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class addHollandRequest extends FormRequest
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
            //'token'=>'required|string',
            'R'=>'required|Integer',
            'A'=>'required|Integer',
            'I'=>'required|Integer',
            'S'=>'required|Integer',
            'E'=>'required|Integer',
            'C'=>'required|Integer',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw (new HttpResponseException(json_fail('参数错误!',$validator->errors()->all(),422)));
    }
}
