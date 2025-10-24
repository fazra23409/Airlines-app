<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soar Airlines - Maskapai Penerbangan Nasional</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
     <link rel="stylesheet" href="{{ asset('css/landingpage.css') }}">
</head>
<body>
    <header>
        <div class="container">
            <nav class="navbar">
                <a href="#" class="logo">
                   <i class="fas fa-plane"></i>
                    AviaLink
                </a>
                <ul class="nav-links">
                    <li><a href="#">Beranda</a></li>
                    <li><a href="{{ route('about') }}">Tentang Kami</a></li>
                    <li><a href="{{ route('login') }}" class="btn" style="color: white;">Masuk</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section class="hero">
      
        <div class="container">
            <h1>Safe Flights with AviaLink </h1>
            <p style="font-size: 15px; text-align:left; margin-left:10px;">Maskapai penerbangan nasional dengan layanan terbaik dan harga terjangkau. Nikmati pengalaman terbang yang tak terlupakan bersama kami!</p>
            <div class="hero-buttons">
                <a href="{{ route('login') }}" class="btn btn-accent"> Pesan Tiket Sekarang</a>
                <a href="#" class="btn" style="background-color: rgba(255,255,255,0.2); backdrop-filter: blur(10px);">Jelajahi Rute</a>
            </div>
        </div>
    </section>
    <section class="features">
        <div class="container">
            <h2><i class="bi bi-star-fill"></i> Keunggulan AviaLink</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-couch"></i>
                    </div>
                    <h3>Kenyamanan Maksimal</h3>
                    <p>Kursi ergonomis dengan legroom yang luas untuk kenyamanan selama penerbangan.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-utensils"></i>
                    </div>
                    <h3>Makanan Lezat</h3>
                    <p>Hidangan lezat dengan pilihan menu Indonesia dan internasional selama penerbangan.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-wifi"></i>
                    </div>
                    <h3>WiFi Gratis</h3>
                    <p>Tetap terhubung dengan WiFi gratis di semua penerbangan jarak jauh kami.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>Keselamatan Terjamin</h3>
                    <p>Standar keselamatan tertinggi dengan armada pesawat terbaru dan perawatan berkala.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="routes">
        <div class="container">
            <h2><i class="bi bi-airplane-fill"></i> Rute Populer AviaLink</h2>
            <div class="routes-grid">
                <div class="route-card">
                    <div class="route-image" style="background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);">
                        <span style="color: white;">Jakarta → Bali</span>
                    </div>
                    <div class="route-content">
                        <h3>Jakarta (CGK) → Denpasar (DPS)</h3>
                        <p>Penerbangan langsung setiap hari dengan berbagai pilihan jam.</p>
                        <div class="route-price">Rp 1.250.000</div>
                        <a href="{{ route('login') }}" class="btn btn-accent">Pesan Sekarang</a>
                    </div>
                </div>
                <div class="route-card">
                    <div class="route-image" style="background: linear-gradient(135deg, #2563eb 0%, #60a5fa 100%);">
                        <span style="color: white;">Jakarta → Surabaya</span>
                    </div>
                    <div class="route-content">
                        <h3>Jakarta (CGK) → Surabaya (SUB)</h3>
                        <p>Penerbangan cepat dengan frekuensi tinggi sepanjang hari.</p>
                        <div class="route-price">Rp 650.000</div>
                        <a href="#" class="btn btn-accent">Pesan Sekarang</a>
                    </div>
                </div>
                <div class="route-card">
                    <div class="route-image" style="background: linear-gradient(135deg, #3b82f6 0%, #93c5fd 100%);">
                        <span style="color: white;">Jakarta → Pontianak</span>
                    </div>
                    <div class="route-content">
                        <h3>Jakarta (CGK) → Pontianak (YIA)</h3>
                        <p>Nikmati keindahan budaya Kalimantan dengan penerbangan langsung.</p>
                        <div class="route-price">Rp 550.000</div>
                        <a href="#" class="btn btn-accent">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonials">
        <div class="container">
            <h2>💬 Apa Kata Penumpang Kami</h2>
            <div class="testimonial-grid">
                <div class="testimonial-card">
                    <div class="testimonial-text">
                        "Penerbangan dengan AviaLink selalu menyenangkan. Kru kabin sangat ramah dan makanan yang disajikan lezat. Recommended!"
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">AS</div>
                        <div>
                            <h4>Ahmad Surya</h4>
                            <p>Freelancer</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-text">
                        "Sebagai pebisnis yang sering terbang, saya sangat menghargai ketepatan waktu dan kenyamanan yang ditawarkan AviaLink."
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">DM</div>
                        <div>
                            <h4>Diana Maulida</h4>
                            <p>Business Owner</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-text">
                        "Pengalaman pertama anak saya naik pesawat dengan AviaLink sangat menyenangkan. Kru sangat perhatian kepada penumpang anak-anak."
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">RS</div>
                        <div>
                            <h4>Rizki Setiawan</h4>
                            <p>Karyawan Swasta</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta">
        <div class="container">
            <h2><i class="bi bi-airplane-fill"></i> Siap Terbang dengan AviaLink?</h2>
            <div class="hero-buttons">
                <a href="#" class="btn btn-accent">Masuk & Pesan Tiket</a>
                <a href="#" class="btn" style="background-color: white; color: var(--primary);">Lihat Semua Rute</a>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>AviaLink</h3>
                    <p>Maskapai penerbangan nasional dengan komitmen memberikan pengalaman terbang terbaik untuk penumpang.</p>
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
                        <li><a href="#">Rute Penerbangan</a></li>
                        <li><a href="#">Promo & Diskon</a></li>
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
                        <li><i class="fas fa-map-marker-alt"></i> Jl. xxxx.Tapos, Depok</li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2023 AviaLink. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>