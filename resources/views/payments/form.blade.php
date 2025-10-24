<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data Diri - Pemesanan Tiket Pesawat</title>
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Form Data Diri</h1>
            <p>Silakan lengkapi data diri Anda untuk melanjutkan pemesanan</p>
        </div>
        
        <div class="form-container">
            <div class="flight-info">
                <h3>Detail Penerbangan</h3>
                <div class="flight-details">
                    <div class="flight-detail">
                        <span class="label">Maskapai</span>
                        <span class="value">{{ $flight->flight_number ?? 'Tidak diketahui' }}</span>
                    </div>
                    <div class="flight-detail">
                        <span class="label">Rute</span>
                        <span class="value">{{ $flight->kota_asal }} - {{ $flight->kota_tujuan }}</span>
                    </div>
                    <div class="flight-detail">
                        <span class="label">Tanggal & Waktu</span>
                        <span class="value">{{ \Carbon\Carbon::parse($flight->departure_time)->translatedFormat('d F Y H:i') }}</span>
                    </div>
                    <div class="flight-detail">
                        <span class="label">Harga</span>
                        <span class="value">Rp {{ number_format($flight->price, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>
            
            <form action="{{ route('payments.store') }}" method="POST">
                @csrf
                <input type="hidden" name="flight_id" value="{{ $flight->id }}">

                <div class="form-group">
                    <label for="name" class="required">Nama Lengkap</label>
                    <input type="text" id="name" name="name" placeholder="Masukkan nama lengkap sesuai KTP" required>
                </div>

                <div class="form-group">
                    <label for="email" class="required">Email</label>
                    <input type="email" id="email" name="email" placeholder="contoh@email.com" required>
                </div>

                <div class="form-group">
                    <label for="phone" class="required">Nomor HP</label>
                    <input type="text" id="phone" name="phone" placeholder="Contoh: 081234567890" required>
                </div>

                <div class="form-group">
                    <label for="no_ktp" class="required">Nomor KTP</label>
                    <input type="text" id="no_ktp" name="no_ktp" placeholder="Masukkan 16 digit nomor KTP" required>
                </div>

                <button type="submit" class="buy-btn">Beli Tiket</button>
                
                <div class="form-footer">
                    <p>Dengan melanjutkan, Anda menyetujui 
                        <a href="#" style="color: #1e88e5;">syarat dan ketentuan</a> yang berlaku
                    </p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
