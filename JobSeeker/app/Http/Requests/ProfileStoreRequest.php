<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileStoreRequest extends FormRequest
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
            'nama' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'kabkota' => 'required',
            'provinsi' => 'required',
            'kodepos' => 'required',
            'email' => 'required',
            'hp' => 'required',
            'gambarcv' => 'required|mimes:pdf',
            'jobpost_id' => 'required|exists:jobposts,id',
        ];
    }
}
