<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Alat Medis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5" style="max-width: 600px;">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Tambah Alat Medis Baru</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('alat.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_alat" class="form-label">Nama Alat</label>
                        <input type="text" class="form-control" id="nama_alat" name="nama_alat" value="{{ old('nama_alat') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="tahun" class="form-label">Tahun Pembuatan</label>
                        <input type="number" class="form-control" id="tahun" name="tahun" value="{{ old('tahun') }}" placeholder="Contoh: 2024" required>
                    </div>

                    <div class="mb-3">
                        <label for="merek" class="form-label">Merek</label>
                        <input type="text" class="form-control" id="merek" name="merek" value="{{ old('merek') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="lokasi" class="form-label">Lokasi Kode</label>
                        <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ old('lokasi') }}" placeholder="Contoh: R101" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('alat.index') }}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-success">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
