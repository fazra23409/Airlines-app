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
        <div class="page-header">
            <div class="page-title">
                <i class="fas fa-history"></i>
                <div>
                    <h1>Riwayat Transaksi</h1>
                    <p>Kelola dan lacak semua tiket penerbangan Anda</p>
                </div>
            </div>
            
            <div class="stats-card">
                <div class="stats-icon primary">
                    <i class="fas fa-receipt"></i>
                </div>
                <div class="stats-content">
                    <h3>{{ $payments->count() }}</h3>
                    <p>Total Transaksi</p>
                </div>
            </div>
        </div>

        @if($payments->count() > 0)
        <div class="transactions-grid">
            @foreach($payments as $index => $payment)
            <div class="transaction-card">
                <div class="transaction-header">
                    <div class="flight-info">
                        <div class="flight-icon">
                            <i class="fas fa-plane"></i>
                        </div>
                        <div class="flight-details">
                            <h3>{{ $payment->flight->flight_number }}</h3>
                            <p>Booking ID: #{{ str_pad($payment->id, 6, '0', STR_PAD_LEFT) }}</p>
                        </div>
                    </div>
                    <div class="transaction-price">
                        <div class="price">Rp {{ number_format($payment->flight->price, 0, ',', '.') }}</div>
                        <div class="date">{{ \Carbon\Carbon::parse($payment->created_at)->format('d M Y') }}</div>
                    </div>
                </div>
                
                <div class="transaction-body">
                    <div class="route-info">
                        <div class="route">
                            <span class="city">{{ $payment->flight->kota_asal }}</span>
                            <span class="airport">Bandara {{ $payment->flight->kota_asal }}</span>
                        </div>
                        <div class="route-path">
                            <div class="path-line"></div>
                            <i class="fas fa-plane"></i>
                            <div class="path-line"></div>
                        </div>
                        <div class="route">
                            <span class="city">{{ $payment->flight->kota_tujuan }}</span>
                            <span class="airport">Bandara {{ $payment->flight->kota_tujuan }}</span>
                        </div>
                    </div>
                    
                    <div class="departure-time">
                        <div class="time">{{ $payment->flight->departure_time }}</div>
                        <div class="duration">Waktu Berangkat</div>
                    </div>
                    
                    <div class="status-section">
                        <div class="status-badge status-{{ $payment->status }}">
                            {{ ucfirst($payment->status) }}
                        </div>
                    </div>
                    
                    <div class="transaction-actions">
                        @if($payment->status === 'approved')
                        <a href="{{ route('payments.ticket', $payment->id) }}" class="btn btn-primary">
                            <i class="fas fa-ticket-alt"></i> Lihat Tiket
                        </a>
                        @else
                        <span class="btn btn-disabled">
                            <i class="fas fa-clock"></i> Menunggu
                        </span>
                        @endif
                        <a href="#" class="btn btn-outline">
                            <i class="fas fa-info-circle"></i> Detail
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="empty-state">
            <div class="empty-icon">
                <i class="fas fa-inbox"></i>
            </div>
            <h3>Tidak Ada Riwayat Transaksi</h3>
            <p>Belum ada tiket penerbangan yang Anda pesan. Mulai jelajahi destinasi impian Anda sekarang!</p>
            <a href="{{ route('home') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Pesan Tiket Sekarang
            </a>
        </div>
        @endif

        <a href="{{ route('home') }}" class="back-btn">
            <i class="fas fa-arrow-left"></i> Kembali ke Beranda
        </a>
    </div>
</body>
</html>