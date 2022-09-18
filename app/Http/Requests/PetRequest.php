<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PetRequest extends FormRequest
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
            'pet.title' => 'required|string|max:50',
            'pet.sex_id' => 'required|integer',
            'pet.age' => 'required|integer',
            'pet.species_id' => 'required|integer',
            'pet.breed' => 'required|string|max:50',
            'pet.prefecture_id' => 'required|integer',
            'pet.delivery_area' => 'required|string|max:50',
            'pet.detail' => 'nullable|string|max:2000',
        ];
    }
}
