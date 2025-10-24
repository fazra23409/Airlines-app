<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Penerbangan - SkyWings</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
</head>
<body>
    <div class="container">
        <div class="page-header">
            <div class="page-icon">
                <i class="fas fa-plane"></i>
            </div>
            <div class="page-title">
                <h1>Edit Data Penerbangan</h1>
                <p>Perbarui informasi penerbangan dengan data terbaru</p>
            </div>
        </div>

        <form action="{{ route('admin.update', $flight->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-card">
                <div class="form-header">
                    <h2><i class="fas fa-edit"></i> Form Edit Penerbangan</h2>
                </div>
                
                <div class="form-body">
                    <div class="flight-info-card">
                        <div class="flight-info-header">
                            <i class="fas fa-info-circle"></i>
                            <h3>Informasi Penerbangan Saat Ini</h3>
                        </div>
                        <div class="flight-details">
                            <div class="flight-detail">
                                <span class="detail-label">Nomor Penerbangan</span>
                                <span class="detail-value">{{ $flight->flight_number }}</span>
                            </div>
                            <div class="flight-detail">
                                <span class="detail-label">Rute</span>
                                <span class="detail-value">{{ $flight->kota_asal }} → {{ $flight->kota_tujuan }}</span>
                            </div>
                            <div class="flight-detail">
                                <span class="detail-label">Waktu Berangkat</span>
                                <span class="detail-value">{{ \Carbon\Carbon::parse($flight->departure_time)->format('d M Y, H:i') }}</span>
                            </div>
                            <div class="flight-detail">
                                <span class="detail-label">Harga Tiket</span>
                                <span class="detail-value">Rp {{ number_format($flight->price, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">Nomor Penerbangan</label>
                            <div class="input-with-icon">
                                <input type="text" name="flight_number" class="form-control" value="{{ $flight->flight_number }}" required placeholder="Masukkan nomor penerbangan">
                                <i class="fas fa-hashtag input-icon"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Kota Asal</label>
                            <div class="input-with-icon">
                                <input type="text" name="kota_asal" class="form-control" value="{{ $flight->kota_asal }}" required placeholder="Masukkan kota asal">
                                <i class="fas fa-plane-departure input-icon"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Kota Tujuan</label>
                            <div class="input-with-icon">
                                <input type="text" name="kota_tujuan" class="form-control" value="{{ $flight->kota_tujuan }}" required placeholder="Masukkan kota tujuan">
                                <i class="fas fa-plane-arrival input-icon"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Waktu Berangkat</label>
                            <div class="input-with-icon">
                                <input type="datetime-local" name="departure_time" class="form-control" value="{{ \Carbon\Carbon::parse($flight->departure_time)->format('Y-m-d\TH:i') }}" required>
                                <i class="fas fa-calendar-alt input-icon"></i>
                            </div>
                        </div>

                        <div class="form-group full-width">
                            <label class="form-label">Harga Tiket (IDR)</label>
                            <div class="input-with-icon">
                                <input type="number" name="price" class="form-control" value="{{ $flight->price }}" required placeholder="Masukkan harga tiket">
                                <i class="fas fa-tag input-icon"></i>
                            </div>
                        </div>

                        <div class="form-actions">
                            <a href="/admin/flights" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>