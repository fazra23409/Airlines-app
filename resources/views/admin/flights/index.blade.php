<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
     <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

<body>
    <div class="container">
        <div class="page-header">
            <h2 class="page-title"><i class="fa-solid fa-plane-departure"></i> Manajemen Penerbangan</h2>
            <a href="{{ route('admin.flights.create') }}" class="btn btn-primary">
                <i class="fa-solid fa-plus"></i> Tambah Penerbangan
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
            </div>
        @endif

        <div class="table-container">
            @if($flights->isEmpty())
                <div class="empty-state">
                    <i class="fa-solid fa-box-open"></i>
                    <p>Belum ada data penerbangan.</p>
                </div>
            @else
            <table class="table table-hover align-middle">
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
                    @foreach($flights as $f)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="flight-number">{{ $f->flight_number }}</td>
                        <td>{{ $f->kota_asal }}</td>
                        <td>{{ $f->kota_tujuan }}</td>
                        <td>{{ $f->departure_time }}</td>
                        <td class="price">Rp {{ number_format($f->price, 0, ',', '.') }}</td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('admin.edit', $f->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fa-solid fa-pen"></i> Edit
                                </a>
                                <form action="{{ route('admin.delete', $f->id) }}" method="POST" onsubmit="return confirm('Hapus penerbangan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa-solid fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>

  
</body>
</html>
