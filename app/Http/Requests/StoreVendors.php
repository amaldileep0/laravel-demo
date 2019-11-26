<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreVendors extends FormRequest
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
            'name' => 'required|max:255',
            'phone' => [
                'required',
                'min:10',
                'regex:/^([0-9\s\-\+\(\)]*)$/',
                'unique:vendors'
            ],
            'gender' => [
                'required',
                Rule::in(['male', 'female']),
            ],
            'country' => 'required|max:255',
            'state' => 'required|max:255',
            'district' => 'required|max:255',
            'city' => 'required|max:255',
            'address' =>  'required|max:255'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
    */
    public function messages()
    {
        return [
            'name.required' => ':attribute must not be blank',
            'phone.required'  => ':attribute must not be blank',
            'gender.required'  => 'Please select :attribute',
            'country.required'  => 'Please Choose :attribute',
            'state.required'  => 'Please Choose :attribute',
            'district.required'  => 'Please Choose :attribute',
            'city.required'  => 'Please Choose :attribute',
            'address.required'  => ':attribute must not be blank',
            'phone.regex' => 'Invalid :attribute'
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
    */
    public function attributes()
    {
        return [
            'name' => 'Name',
            'phone' => 'Phone Number',
            'gender' => 'Gender',
            'country' => 'Country',
            'state' => 'State',
            'district' => 'District',
            'city' => 'City',
            'address' => 'Address'
        ];
    }
}
