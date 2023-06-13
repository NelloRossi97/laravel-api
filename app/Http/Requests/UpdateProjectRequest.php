<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            'title' => 'required|unique:projects|max:150|min:3',
            'image' => 'nullable',
            'description' => 'nullable',
            'type_id' => 'nullable|exists:types,id'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Il titolo è obbligatorio!',
            'title.unique:projects' => 'Questo titolo esiste già!',
            'title.max' => 'Il titolo deve essere lungo massimo :max caratteri!',
            'title.min' => 'Il titolo deve essere lungo almeno :min caratteri!'
        ];
    }
}