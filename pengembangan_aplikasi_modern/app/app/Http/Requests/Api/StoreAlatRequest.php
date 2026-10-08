<?php

namespace App\Http\Requests\Api;

class StoreAlatRequest extends BaseApiRequest
{
    public function rules(): array
    {
        return [
            'nama_alat' => ['required', 'string', 'max:100'],
            'tahun' => ['required', 'digits:4', 'integer'],
            'merek' => ['required', 'string', 'max:60'],
            'lokasi' => ['required', 'string', 'max:10'],
        ];
    }
}
