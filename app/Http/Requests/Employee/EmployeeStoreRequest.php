<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'company_id' => 'required|integer',
            'user_pasport_seria' => 'required|string',
            'user_full_name' => 'required|string',
            'user_position' => 'required|string',
            'user_phone_number' => 'required|string',
            'user_address' => 'required|string',
        ];
    }
}