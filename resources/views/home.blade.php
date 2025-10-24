<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AVIALINK - Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
    <header>
        <nav class="navbar">
            <a href="#" class="logo">
                <i class="fas fa-plane"></i>
                AviaLink
            </a>
            <ul class="nav-links">
                <li><a href="#" class="active">Beranda</a></li>
                <li><a href="{{ route('payments.history') }}">riwayat transaksi</a></li>
                <li><a href="#">Bantuan</a></li>
            </ul>
            <div class="user-menu">
            <a href="{{ route('profile.show') }}" class="user-info" style="text-decoration: none;">
                <div class="user-avatar">
                    {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                </div>
                <span>{{ Auth::user()->name }}</span>
            </a>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i>
                </button>
            </form>
        </div>

            <div class="mobile-menu">
                <i class="fas fa-bars"></i>
            </div>
        </nav>
    </header>
    
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h2 class="sidebar-title">Menu</h2>
            <button class="close-sidebar" id="closeSidebar"><i class="fas fa-times"></i></button>
        </div>
        <ul class="sidebar-menu">
            <li><a href="#" class="active"><i class="fas fa-home"></i> Beranda</a></li>
            <li><a href="#"><i class="fas fa-plane"></i> Penerbangan</a></li>
            <li><a href="#"><i class="fas fa-tags"></i> Promo</a></li>
            <li><a href="#"><i class="fas fa-question-circle"></i> Bantuan</a></li>
        </ul>
    </div>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Jelajahi Dunia dengan AviaLink</h1>
            <p>Temukan penerbangan terbaik dengan harga terjangkau ke berbagai destinasi impian Anda</p>
        </div>
    </section>

    <section class="search-section">
        <div class="search-tabs">
            <div class="tab active">Sekali Jalan</div>
            <div class="tab">Pulang Pergi</div>
          
        </div>
       <form class="search-form" action="{{ route('flights.search') }}" method="POST">
        @csrf
            <div class="form-group">
                <label for="from">Dari</label>
                <input type="text" id="from" name="from" class="form-control" placeholder="Kota atau bandara" required>
            </div>
            <div class="form-group">
                <label for="to">Ke</label>
                <input type="text" id="to" name="to" class="form-control" placeholder="Kota atau bandara" required>
            </div>
            <div class="form-group">
                <label for="departure">Berangkat</label>
                <input type="date" id="departure" name="departure_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="passengers">Penumpang & Kelas</label>
                 <select id="passengers" name="class" class="form-control">
                    <option value="ekonomi">1 Dewasa, Ekonomi</option>
                    <option value="bisnis">1 Dewasa, Bisnis</option>
                </select>
            </div>
            <button type="submit" class="search-btn">Cari Penerbangan</button>
        </form>
    </section>

    <section class="popular-routes">
        <h2 class="section-title">Rute Populer</h2>
        <div class="routes-grid">
            <div class="route-card">
                <div class="route-image" style="background-color: #e3f2fd;">
                    <span>Jakarta - Bali</span>
                </div>
                <div class="route-content">
                    <h3 class="route-title">Jakarta (CGK) → Denpasar (DPS)</h3>
                    <div class="route-details">
                        <span>Langsung</span>
                        <span>2 jam 30 menit</span>
                    </div>
                    <div class="route-price">Rp 1.250.000</div>
                    <button class="book-btn">Pesan Sekarang</button>
                </div>
            </div>
            <div class="route-card">
                <div class="route-image" style="background-color: #fff3e0;">
                    <span>Jakarta - Surabaya</span>
                </div>
                <div class="route-content">
                    <h3 class="route-title">Jakarta (CGK) → Surabaya (SUB)</h3>
                    <div class="route-details">
                        <span>Langsung</span>
                        <span>1 jam 45 menit</span>
                    </div>
                    <div class="route-price">Rp 650.000</div>
                    <button class="book-btn">Pesan Sekarang</button>
                </div>
            </div>
            <div class="route-card">
                <div class="route-image" style="background-color: #e8f5e9;">
                    <span>Jakarta - Yogyakarta</span>
                </div>
                <div class="route-content">
                    <h3 class="route-title">Jakarta (CGK) → Yogyakarta (YIA)</h3>
                    <div class="route-details">
                        <span>Langsung</span>
                        <span>1 jam 15 menit</span>
                    </div>
                    <div class="route-price">Rp 550.000</div>
                    <button class="book-btn">Pesan Sekarang</button>
                </div>
            </div>
        </div>
    </section>
    <section class="promo-section">
        <h2 class="section-title">Promo Spesial</h2>
        <div class="promo-card">
            <h3>Diskon 20% untuk Penerbangan Pertama</h3>
            <p>Gunakan kode promo di bawah untuk mendapatkan diskon 20% pada pembelian tiket pertama Anda</p>
            <div class="promo-code">AVIALINK20</div>
            <p>Berlaku hingga 31 Desember 2023</p>
            <a href="#" class="cta-button">Pesan Sekarang</a>
        </div>
    </section>
    <footer>
        <div class="footer-content">
            <div class="footer-column">
                <h3>AviaLink</h3>
                <p>Maskapai penerbangan terpercaya dengan layanan terbaik untuk perjalanan Anda.</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="footer-column">
                <h3>Tautan Cepat</h3>
                <ul class="footer-links">
                    <li><a href="#">Beranda</a></li>
                    <li><a href="#">Penerbangan</a></li>
                    <li><a href="#">Promo</a></li>
                    <li><a href="#">Tentang Kami</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Layanan</h3>
                <ul class="footer-links">
                    <li><a href="#">Pemesanan Tiket</a></li>
                    <li><a href="#">Cek Penerbangan</a></li>
                    <li><a href="#">Bagasi</a></li>
                    <li><a href="#">Bantuan</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Kontak</h3>
                <ul class="footer-links">
                    <li><i class="fas fa-phone"></i> 1500-123</li>
                    <li><i class="fas fa-envelope"></i> info@avialink.com</li>
                    <li><i class="fas fa-map-marker-alt"></i> Jl. Merpati No. 15, Jakarta</li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2023 AviaLink. All rights reserved.</p>
        </div>
    </footer>

  <script src="{{ asset('js/home.js') }}"></script>
</body>
</html>