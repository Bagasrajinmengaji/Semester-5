<?php

namespace App\Http\Requests\Api;

class UpdateAlatRequest extends BaseApiRequest
{
    public function rules(): array
    {
        return [
            'nama_alat' => ['sometimes', 'required', 'string', 'max:100'],
            'tahun' => ['sometimes', 'required', 'digits:4', 'integer'],
            'merek' => ['sometimes', 'required', 'string', 'max:60'],
            'lokasi' => ['sometimes', 'required', 'string', 'max:10'],
        ];
    }
}
