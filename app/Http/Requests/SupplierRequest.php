<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
                'name' => ['required', 'max:100'],
                'address' => ['required']
                
            ];
    }
    
    public function messages() : array
    {
        return [
                'name.required' => 'Il faut spécifier un nom',
                'name.max' => 'Le nom ne doit pas contenir plus de 100 caractères',
                'address.required' => 'Il faut spécifier une adresse'
            ];
    }
    
    public function attributes() : array
    {
        return [
                'name' => 'name',
                'address' => 'address'
            ];
    }
}
