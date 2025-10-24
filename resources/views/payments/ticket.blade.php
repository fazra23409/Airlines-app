<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Tiket Penerbangan</title>
     <link rel="stylesheet" href="{{ asset('css/ticket.css') }}">
</head>
<body>
    <div class="ticket">
        <div class="header">
            <h2>TIKET PENERBANGAN</h2>
        </div>
        
        <div class="info-section">
            <h3>Informasi Penumpang</h3>
            <div class="info-row">
                <div class="info-label">Nama Lengkap:</div>
                <div class="info-value">{{ $payment->name }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">No. KTP:</div>
                <div class="info-value">{{ $payment->no_ktp }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Email:</div>
                <div class="info-value">{{ $payment->email }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">No. HP:</div>
                <div class="info-value">{{ $payment->phone }}</div>
            </div>
        </div>
        
        <div class="flight-details">
            <h3>Detail Penerbangan</h3>
            <div class="info-row">
                <div class="info-label">Nomor Penerbangan:</div>
                <div class="info-value">{{ $payment->flight->flight_number }}</div>
            </div>
            
            <div class="route">
                <div>{{ $payment->flight->kota_asal }}</div>
                <div class="route-arrow">➜</div>
                <div>{{ $payment->flight->kota_tujuan }}</div>
            </div>
            
            <div class="info-row">
                <div class="info-label">Waktu Keberangkatan:</div>
                <div class="info-value">{{ $payment->flight->departure_time }}</div>
            </div>
            
            <div class="info-row">
                <div class="info-label">Status:</div>
                <div class="info-value">
                    <span class="status {{ $payment->status == 'confirmed' ? 'status-confirmed' : 'status-pending' }}">
                        {{ ucfirst($payment->status) }}
                    </span>
                </div>
            </div>
        </div>
        
        <div class="barcode">
            <div class="barcode-placeholder">|| | ||| | || ||| | || | |||</div>
        </div>
        
        <div class="footer">
            <p>Terima kasih telah memilih maskapai kami. Selamat terbang!</p>
        </div>
    </div>
    
    <a href="{{ route('payments.download', $payment->id) }}" class="download-btn">
        Download Tiket (PDF)
    </a>
</body>
</html>