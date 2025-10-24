<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - SkyWings</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
</head>
<body>
    <header>
        <nav class="navbar">
            <a href="{{ url('/') }}" class="logo">
                <i class="fas fa-plane"></i>
                AviaLink
            </a>
            <ul class="nav-links">
                <li><a href="{{ route('profile.show') }}" class="active">Profil</a></li>
                <li><a href="{{ url('/home') }}">back</a></li>
            </ul>
        </nav>
    </header>

    <section class="profile-section">
        <h2>My profile</h2>

        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <div class="profile-card">
            <div class="profile-header">
                <div class="profile-avatar">
                    {{ strtoupper(substr($user->name, 0, 2)) }}
                </div>
                <div class="profile-info">
                    <h3>{{ $user->name }}</h3>
                    <p>{{ $user->email }}</p>
                </div>
            </div>

            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                </div>
                <div class="form-group">
                    <label for="password">Password Baru (opsional)</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan password baru">
                    <p class="password-note">Kosongkan jika tidak ingin mengubah password</p>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi password baru">
                </div>
                <button type="submit" class="btn-save">Simpan Perubahan</button>
            </form>
        </div>
    </section>

    <script src="{{ asset('js/profile.js') }}"></script>

</body>
</html>