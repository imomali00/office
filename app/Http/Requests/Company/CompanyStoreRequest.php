<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class CompanyStoreRequest extends FormRequest
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
            'user_id' =>[ auth()->user()->id],
            'company_name' => 'required|string',
            'boss_full_name' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|string',
            'company_site' => 'required|string',
            'phone_number' => 'required|string',
        ];
    }
}