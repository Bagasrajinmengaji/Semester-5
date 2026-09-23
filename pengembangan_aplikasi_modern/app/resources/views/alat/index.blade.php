<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaris Alat Medis</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">Inventaris Alat Medis</h2>
            <a href="{{ route('alat.create') }}" class="btn btn-primary">+ Tambah Alat</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <table class="table table-hover table-striped mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Alat</th>
                            <th>Tahun</th>
                            <th>Merek</th>
                            <th>Lokasi</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($alats as $index => $alat)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $alat->nama_alat }}</td>
                                <td>{{ $alat->tahun }}</td>
                                <td>{{ $alat->merek }}</td>
                                <td><span class="badge bg-info text-dark">{{ $alat->lokasi }}</span></td>
                                <td class="text-center">
                                    <a href="{{ route('alat.show', $alat->id) }}" class="btn btn-sm btn-info text-white">Detail</a>
                                    <a href="{{ route('alat.edit', $alat->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('alat.destroy', $alat->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">Belum ada data alat medis.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
