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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'noreg' => 'required|numeric|unique:users,noreg,id',
            'email' => 'unique:users,email,except,id|email|nullable',
            'password' => 'required',
            'company_id' => 'required|exists:companies,id',
            'departement_id' => 'required|exists:departements,id',
        ];
    }
}
