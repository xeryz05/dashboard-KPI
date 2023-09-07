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
            'email' => 'required|unique:users,email,except,id|email|',
            'password' => 'required|',
            'company_id' => 'required|exists:companies,id',
            'role_id' => 'required|exists:roles,id',
            'departement_id' => 'required|exists:departements,id',
        ];
    }
}
