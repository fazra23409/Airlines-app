<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi - SkyWings</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background: #f9f9f9; padding: 20px; }
        h2 { margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; background: white; }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #007bff; color: white; }
        tr:hover { background-color: #f1f1f1; }
        .back-btn {
            margin-top: 20px;
            display: inline-block;
            background: #007bff;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
        }
        .back-btn:hover { background: #0056b3; }
    </style>
</head>
<body>
    <h2>Riwayat Transaksi</h2>

    @if($payments->count() > 0)
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Penerbangan</th>
                <th>Kota Asal</th>
                <th>Kota Tujuan</th>
                <th>Waktu Berangkat</th>
                <th>Harga</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $index => $payment)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $payment->flight->flight_number }}</td>
                <td>{{ $payment->flight->kota_asal }}</td>
                <td>{{ $payment->flight->kota_tujuan }}</td>
                <td>{{ $payment->flight->departure_time }}</td>
                <td>Rp {{ number_format($payment->flight->price, 0, ',', '.') }}</td>
                <td>{{ ucfirst($payment->status) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p>Tidak ada riwayat transaksi.</p>
    @endif

    <a href="{{ route('home') }}" class="back-btn">⬅ Kembali ke Beranda</a>
</body>
</html>
