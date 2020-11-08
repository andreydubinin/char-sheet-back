<?php

namespace App\Http\Requests\Characteristic;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreCharacteristicRequest
 * @package App\Http\Requests
 */
class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'parent_id' => 'exists:characteristics,id',
            'name'      => 'required',
        ];
    }
}
