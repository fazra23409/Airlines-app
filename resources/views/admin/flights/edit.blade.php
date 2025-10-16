<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<div class="container mt-4">
    <h2>Edit Data Penerbangan</h2>

    <form action="{{ route('admin.update', $flight->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nomor Penerbangan</label>
            <input type="text" name="flight_number" class="form-control" value="{{ $flight->flight_number }}" required>
        </div>
        <div class="mb-3">
            <label>Kota Asal</label>
            <input type="text" name="kota_asal" class="form-control" value="{{ $flight->kota_asal }}" required>
        </div>
        <div class="mb-3">
            <label>Kota Tujuan</label>
            <input type="text" name="kota_tujuan" class="form-control" value="{{ $flight->kota_tujuan }}" required>
        </div>
        <div class="mb-3">
            <label>Waktu Berangkat</label>
            <input type="datetime-local" name="departure_time" class="form-control" value="{{ \Carbon\Carbon::parse($flight->departure_time)->format('Y-m-d\TH:i') }}" required>
        </div>
        <div class="mb-3">
            <label>Harga Tiket</label>
            <input type="number" name="price" class="form-control" value="{{ $flight->price }}" required>
        </div>

        <button type="submit" class="btn btn-success">edit</button>
        <a href="/admin/flights" class="btn btn-secondary">Kembali</a>
    </form>
</div>


</body>
</html>