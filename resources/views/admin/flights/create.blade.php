<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Penerbangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

<div class="container mt-4">
    <h2>Tambah Penerbangan Baru</h2>

    <form action="{{ route('admin.add') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nomor Penerbangan</label>
            <input type="text" name="flight_number" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Kota Asal</label>
            <input type="text" name="kota_asal" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Kota Tujuan</label>
            <input type="text" name="kota_tujuan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Waktu Berangkat</label>
            <input type="datetime-local" name="departure_time" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Harga Tiket</label>
            <input type="number" name="price" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="/admin/flights" class="btn btn-secondary">Kembali</a>
    </form>
</div>

</body>
</html>
