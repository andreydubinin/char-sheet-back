<?php

namespace App\Http\Requests\Weapon;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
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
            'charsheet_id' => 'required|exists:charsheets,id',
        ];
    }

    /**
     * @return int
     */
    public function getCharsheetId(): int
    {
        return $this->input('charsheet_id');
    }
}
