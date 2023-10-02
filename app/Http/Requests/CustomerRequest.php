<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CustomerRequest extends FormRequest
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

            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'gender' => 'required|string|min:4|max:6',
            'age' => 'required|integer',
            'phone_number' => 'required|string|min:6|max:50',
            'address' => 'required|string|max:255',
            'birthdate'=>'required|date'
        ];
    }
}
