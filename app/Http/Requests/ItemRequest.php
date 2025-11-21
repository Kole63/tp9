<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Supplier;
use Illuminate\Validation\Rules\File;

class ItemRequest extends FormRequest
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
                'title' => ['required', 'max:100'],
                'description' => ['required'],
                'price' => ['required', 'min:0.01', 'numeric'],
                'image' => [ File::image()->max('400kb') ],
                'supplier_id' => ['required', 'exists:suppliers,id']
            ];
    }
    
    /**
     * Messages associated to validation rules.
     */
    public function messages() : array
    {
        return [
                'title.required' => 'Il faut spécifier un intitulé',
                'title.max' => 'L\'intitulé ne doit pas contenir plus de 100 caractères',
                'description.required' => 'Il faut spécifier une description',
                'price.required' => 'Il faut spécifier un prix',
                'price.numeric' => 'Le prix est incorrect',
                'price.min' => 'Le prix est obligatoirement positif',
                'supplier_id.required' => 'Le fournisseur doit être renseigné',
                'supplier_id.exists' => 'Le fournisseur sélectionné n\'existe pas',
                'image.max' => 'Le fichier ne doit pas dépasser la taille de 400kb',
                'image.image' => 'Le fichier doit être une image'
            ];
    }
    
    /**
     * Attributes of the model.
     */
    public function attributes() : array
    {
        return [
                'title' => 'title',
                'description' => 'description',
                'price' => 'price',
                'image' => 'image',
                'supplier_id' => 'supplier_id'
            ];
    }
}
