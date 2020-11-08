<?php

namespace App\Http\Requests\Charsheet;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class SetCharacteristicRequest
 * @package App\Http\Requests
 */
class SetCharacteristicRequest extends FormRequest
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
            'characteristic_id' => 'required|exists:characteristics,id',
            'value'             => 'required',
        ];
    }
}
