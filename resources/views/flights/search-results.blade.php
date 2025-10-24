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
    <div class="container">
        <div class="search-header">
            <div>
                <h1 class="search-title">Hasil Pencarian Penerbangan</h1>
                <p class="search-info">Dari <b>{{ $from }}</b> ke <b>{{ $to }}</b> — Tanggal: <b>{{ $departure }}</b></p>
            </div>
            <div class="results-count">{{ $flights->count() }} Penerbangan Ditemukan</div>
        </div>

        @if ($flights->count() > 0)
            <div class="flight-results">
                @foreach ($flights as $index => $flight)
                <div class="flight-card">
                    <div class="flight-header">
                        <div class="flight-number">{{ $flight->flight_number }}</div>
                        <div class="flight-price">Rp {{ number_format($flight->price, 0, ',', '.') }}</div>
                    </div>
                    
                    <div class="flight-body">
                        <div class="route-info">
                            <div class="city">{{ $flight->kota_asal }}</div>
                            <div class="airport">Bandara {{ $flight->kota_asal }}</div>
                        </div>
                        
                        <div class="flight-path">
                            <div class="path-dot"></div>
                            <div class="path-line"></div>
                            <div class="path-plane"><i class="fas fa-plane"></i></div>
                            <div class="path-line"></div>
                            <div class="path-dot"></div>
                        </div>
                        
                        <div class="route-info">
                            <div class="city">{{ $flight->kota_tujuan }}</div>
                            <div class="airport">Bandara {{ $flight->kota_tujuan }}</div>
                        </div>
                    </div>
                    
                    <div class="flight-time">
                        {{ $flight->departure_time }}
                    </div>
                    
                    <div class="flight-duration">
                        Perkiraan durasi: 2 jam 15 menit
                    </div>
                    
                    <div class="flight-footer">
                        <div class="flight-details">
                            <i class="fas fa-suitcase"></i> 20kg Bagasi • <i class="fas fa-utensils"></i> Makanan Termasuk
                        </div>
                        <div class="flight-actions">
                            <form action="{{ route('payments.store') }}" method="POST" style="display: inline;">
                                @csrf
                                <input type="hidden" name="flight_id" value="{{ $flight->id }}">
                                <a href="{{ route('payments.form', $flight->id) }}" class="buy-btn">
                                    <i class="fas fa-shopping-cart"></i> Beli Tiket
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="no-results">
                <div class="no-results-icon">
                    <i class="fas fa-plane-slash"></i>
                </div>
                <h3>Tidak Ada Penerbangan yang Ditemukan</h3>
                <p>Maaf, tidak ada penerbangan yang cocok dengan kriteria pencarian Anda.</p>
                <a href="{{ route('home') }}" class="back-btn">
                    <i class="fas fa-arrow-left"></i> Kembali ke Beranda
                </a>
            </div>
        @endif

        @if ($flights->count() > 0)
            <a href="{{ route('home') }}" class="back-btn">
                <i class="fas fa-arrow-left"></i> Kembali ke Beranda
            </a>
        @endif
    </div>
</body>
</html>