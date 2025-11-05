<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEspecialidadRequest extends FormRequest
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
            "codigo" => "string|required|max:255|unique:especialidades,codigo",
            "nombre" => "string|required|max:255", 
        ];
    }

    public function messages()
    {
        return [
            "codigo.required" => "Codigo requerido",
            "codigo.unique" => "Ya existe una especialidad con ese codigo",
            "nombre.required" => "Nombre requerido",
        ];
    }
}
