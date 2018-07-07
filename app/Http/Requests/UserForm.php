<?php

namespace BCES\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserForm extends FormRequest
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
            'name' => 'string|max:100',
            'email' => 'email|max:100',
            'phone' => 'string|max:20',
            'avatar' => 'image',
            'company' => 'string|max:50',
            'username' => 'string|max:50',
            'password' => 'string|max:50',
        ];
    }
}
