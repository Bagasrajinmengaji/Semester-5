<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreAlatRequest;
use App\Http\Requests\Api\UpdateAlatRequest;
use App\Http\Resources\AlatResource;
use App\Models\Alat;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AlatApiController extends Controller
{
    use ApiResponse;

    /**
     * Menampilkan daftar semua alat medis.
     */
    public function index(Request $request): JsonResponse
    {
        $perPage = (int) $request->get('per_page', 15);
        $alats = Alat::latest()->paginate($perPage);

        return $this->successResponse([
            'items' => AlatResource::collection($alats->items()),
            'pagination' => [
                'current_page' => $alats->currentPage(),
                'last_page' => $alats->lastPage(),
                'per_page' => $alats->perPage(),
                'total' => $alats->total(),
            ],
        ], 'Daftar alat berhasil diambil');
    }

    /**
     * Menyimpan data alat medis baru.
     */
    public function store(StoreAlatRequest $request): JsonResponse
    {
        $alat = Alat::create($request->validated());

        return $this->successResponse(
            new AlatResource($alat),
            'Data alat medis berhasil ditambahkan',
            201
        );
    }

    /**
     * Menampilkan detail satu alat medis berdasarkan ID.
     */
    public function show(string $id): JsonResponse
    {
        $alat = Alat::find($id);

        if (!$alat) {
            return $this->errorResponse('Data alat medis tidak ditemukan', 404);
        }

        return $this->successResponse(
            new AlatResource($alat),
            'Detail data alat medis berhasil diambil'
        );
    }

    /**
     * Memperbarui data alat medis.
     */
    public function update(UpdateAlatRequest $request, string $id): JsonResponse
    {
        $alat = Alat::find($id);

        if (!$alat) {
            return $this->errorResponse('Data alat medis tidak ditemukan', 404);
        }

        $alat->update($request->validated());

        return $this->successResponse(
            new AlatResource($alat),
            'Data alat medis berhasil diperbarui'
        );
    }

    /**
     * Menghapus data alat medis.
     */
    public function destroy(string $id): JsonResponse
    {
        $alat = Alat::find($id);

        if (!$alat) {
            return $this->errorResponse('Data alat medis tidak ditemukan', 404);
        }

        $alat->delete();

        return $this->successResponse(null, 'Data alat medis berhasil dihapus');
    }
}
