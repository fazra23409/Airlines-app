<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pencarian - SkyWings</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/search.css') }}">
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
                            <a href="{{ route('payments.form', $flight->id) }}" class="buy-btn">Beli</a>

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
