<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi - SkyWings</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/riwayat.css') }}">
</head>
<body>
    <div class="container">
        <header>
            <h2><i class="fas fa-history"></i> Riwayat Transaksi</h2>
        </header>

        @if($payments->count() > 0)
        <div class="card">
            <div class="card-header">
                <i class="fas fa-receipt"></i> Daftar Penerbangan
            </div>
            <div class="card-body">
                <div class="responsive-table">
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
                                <th>Tiket</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($payments as $index => $payment)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td class="flight-number">{{ $payment->flight->flight_number }}</td>
                                <td>{{ $payment->flight->kota_asal }}</td>
                                <td>{{ $payment->flight->kota_tujuan }}</td>
                                <td>{{ $payment->flight->departure_time }}</td>
                                <td class="price">Rp {{ number_format($payment->flight->price, 0, ',', '.') }}</td>
                                <td>
                                    <span class="status status-{{ $payment->status }}">
                                        {{ ucfirst($payment->status) }}
                                    </span>
                                </td>
                                <td>
                                    @if($payment->status === 'approved')
                                    <a href="{{ route('payments.ticket', $payment->id) }}" 
                                       class="btn btn-primary">
                                        <i class="fas fa-ticket-alt"></i> Lihat Tiket
                                    </a>
                                    @else
                                    <span style="color: var(--gray);">
                                        <i class="fas fa-clock"></i> Belum tersedia
                                    </span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @else
        <div class="card">
            <div class="empty-state">
                <i class="fas fa-inbox"></i>
                <p>Tidak ada riwayat transaksi.</p>
                <a href="{{ route('home') }}" class="btn btn-outline">
                    <i class="fas fa-plus"></i> Pesan Tiket Sekarang
                </a>
            </div>
        </div>
        @endif

        <a href="{{ route('home') }}" class="back-btn">
            <i class="fas fa-arrow-left"></i> Kembali ke Beranda
        </a>
    </div>
</body>
</html>