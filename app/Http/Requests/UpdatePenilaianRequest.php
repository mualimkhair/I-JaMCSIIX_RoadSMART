<?php

namespace App\Http\Requests;

use App\Models\Kriteria;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePenilaianRequest extends FormRequest
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
            'jalan_id' => 'required',
            // 'jalan_id' => 'required|unique:tabel_jalan,id,' . $this->id . ',id',
            'bobot.*' => 'required',
        ];
    }

    public function attributes(): array
    {
        $attributes = [
            'jalan_id' => 'jalan',
        ];
        foreach ($this->input('bobot', []) as $kriteria_id => $bobot) {
            if ($kriteria = Kriteria::find($kriteria_id)) {
                $attributes['bobot.' . $kriteria_id] = strtolower($kriteria->nama_kriteria);
            }
        }
        return $attributes;
    }
}
