<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Alat Medis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5" style="max-width: 600px;">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-info text-white">
                <h4 class="mb-0">Detail Alat Medis</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th width="35%">ID</th>
                        <td>{{ $alat->id }}</td>
                    </tr>
                    <tr>
                        <th>Nama Alat</th>
                        <td>{{ $alat->nama_alat }}</td>
                    </tr>
                    <tr>
                        <th>Tahun</th>
                        <td>{{ $alat->tahun }}</td>
                    </tr>
                    <tr>
                        <th>Merek</th>
                        <td>{{ $alat->merek }}</td>
                    </tr>
                    <tr>
                        <th>Lokasi</th>
                        <td><span class="badge bg-info text-dark">{{ $alat->lokasi }}</span></td>
                    </tr>
                    <tr>
                        <th>Dibuat Pada</th>
                        <td>{{ $alat->created_at ? $alat->created_at->format('d M Y H:i') : '-' }}</td>
                    </tr>
                </table>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('alat.index') }}" class="btn btn-secondary">Kembali</a>
                    <div>
                        <a href="{{ route('alat.edit', $alat->id) }}" class="btn btn-warning">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
