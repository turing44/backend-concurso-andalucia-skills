<?php

namespace App\Http\Requests;

use App\Models\Especialidad;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEspecialidadRequest extends FormRequest
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
     * 
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "codigo" => "string|required|unique:especialidades,codigo,". $this->especialidad->codigo . ",codigo",
            "nombre" => "string|required|max:255", 
        ];
    }

    public function messages()
    {
        return [
            "codigo.unique" => "Ya hay una especialidad con ese codigo",
            "nombre.required" => "Nombre requerido",
        ];
    }
}
