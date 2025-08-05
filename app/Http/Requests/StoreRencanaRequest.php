<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRencanaRequest extends FormRequest
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
            // 'jalan_id' => 'required',
            // 'tanggal_pengusulan' => 'required',
            // 'biaya_estimasi' => 'required',
            // 'deskripsi' => 'required',
            // 'nilai' => 'required',
        ];
    }

    public function attributes(): array
    {
        return [
            'jalan_id' => 'jalan',
        ];
    }
}
