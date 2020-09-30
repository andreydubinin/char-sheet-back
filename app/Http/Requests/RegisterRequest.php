<?php

namespace App\Http\Requests;

use App\Rules\ValidPhoneRule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class RegisterRequest
 * @package App\Http\Requests
 */
class RegisterRequest extends FormRequest
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
    public function rules()
    {
        return [
            'login'    => [
                'required',
                'string',
                'min:3',
                'unique:users,login',
            ],
            'password' => [
                'required',
                'confirmed',
            ],
            'phone'    => [
                'required',
                new ValidPhoneRule(),
            ],
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'login'    => __('auth.login'),
            'password' => __('auth.password'),
            'phone'    => __('auth.phone'),
        ];
    }
}
