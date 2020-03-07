<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $passwordRules = 'min:8|max:100';
        $rules = [
            'phone' => 'required|min:10|regex:/(0)[0-9\s-]{9}/',
            'first_name'  => 'required|regex:/^[\p{L} ]+$/u|max:50|min:2',
            'last_name'  => 'required|regex:/^[\p{L} ]+$/u|max:50|min:2',
            'type'  => 'required',
            'email' => 'required|email|min:2|max:100|unique:users'
        ];

        if ($this->method() == 'POST') {
            $rules['password'] = $passwordRules . "|required";

        }

        if ($this->method() == 'PUT') {
            $rules['email'] = $rules['email'] . ",email," . $this->id;
            if ($this->password) {
                $rules['password'] = $passwordRules;
            }
        }

        return $rules;
    }


}

