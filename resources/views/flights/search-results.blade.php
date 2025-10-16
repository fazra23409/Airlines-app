<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pencarian - SkyWings</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; padding: 20px; background: #f9f9f9; }
        h2 { margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; background: white; }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #007bff; color: white; }
        tr:hover { background-color: #f1f1f1; }
        .no-results { margin-top: 20px; color: #777; font-size: 18px; }
        .back-btn { margin-top: 20px; display: inline-block; background: #007bff; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px; }
        .back-btn:hover { background: #0056b3; }
        .buy-btn {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }
        .buy-btn:hover { background-color: #218838; }
    </style>
</head>
<body>
    <h2>Hasil Pencarian Penerbangan</h2>
    <p>Dari <b>{{ $from }}</b> ke <b>{{ $to }}</b> — Tanggal: <b>{{ $departure }}</b></p>

    @if ($flights->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nomor Penerbangan</th>
                    <th>Kota Asal</th>
                    <th>Kota Tujuan</th>
                    <th>Waktu Berangkat</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($flights as $index => $flight)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $flight->flight_number }}</td>
                    <td>{{ $flight->kota_asal }}</td>
                    <td>{{ $flight->kota_tujuan }}</td>
                    <td>{{ $flight->departure_time }}</td>
                    <td>Rp {{ number_format($flight->price, 0, ',', '.') }}</td>
                    <td>
                        <form action="{{ route('payments.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="flight_id" value="{{ $flight->id }}">
                            <button type="submit" class="buy-btn">Beli</button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="no-results">
            Tidak ada penerbangan yang cocok dengan pencarian Anda.
        </div>
    @endif

    <a href="{{ route('home') }}" class="back-btn">⬅ Kembali ke Beranda</a>
     
</body>
</html>
