<?php

namespace App\Http\Requests\Charsheet;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateCharsheetRequest
 * @package App\Http\Requests
 */
class UpdateRequest extends FormRequest
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
            //
        ];
    }
}
