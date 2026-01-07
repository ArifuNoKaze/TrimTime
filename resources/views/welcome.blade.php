<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Barber Door Square</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <nav class="navbar">
        <div class="logo">Barber Door Square</div>
        <div class="auth-buttons">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-primary">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-secondary">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </nav>

    <header class="hero">
        <div class="hero-content">
            <h1>Barber Door Square</h1>
            <p>Potongan Rambut Klasik & Modern untuk Pria Masa Kini.</p>
            <a href="#services" class="btn btn-gold">Lihat Layanan</a>
        </div>
        
    </header>

    <section class="info-card-container">
        <div class="info-card">
            <div class="icon-box">
                <i class="fa-solid fa-location-dot"></i>
            </div>
            <div class="text-box">
                <h3>Lokasi Kami</h3>
                <p>Jl. Jendral Sudirman No. 45, Pusat Kota</p>
            </div>
        </div>
        <div class="info-card">
            <div class="icon-box">
                <i class="fa-solid fa-clock"></i>
            </div>
            <div class="text-box">
                <h3>Jam Buka</h3>
                <p>Senin - Minggu: 10.00 - 21.00</p>
            </div>
        </div>
        <div class="info-card">
            <div class="icon-box">
                <i class="fa-solid fa-phone"></i>
            </div>
            <div class="text-box">
                <h3>Kontak</h3>
                <p>+62 812-3456-7890</p>
            </div>
        </div>
    </section>

    <section id="services" class="services">
        <div class="section-title">
            <h2>Layanan Kami</h2>
            <p>Pilih paket grooming terbaik untuk Anda</p>
        </div>

        <div class="service-grid">
            <div class="service-card">
                
                <img src="https://images.unsplash.com/photo-1599351431202-1e0f0137899a?q=80&w=800&auto=format&fit=crop" alt="Gentleman Cut">
                <div class="service-info">
                    <h3>Gentleman Cut</h3>
                    <p>Potongan rambut detail + keramas + styling pomade.</p>
                    <span class="price">Rp 85.000</span>
                </div>
            </div>

            <div class="service-card">
                
                <img src="https://images.unsplash.com/photo-1621605815971-fbc98d665033?q=80&w=800&auto=format&fit=crop" alt="Beard Trim">
                <div class="service-info">
                    <h3>Beard Trim & Shape</h3>
                    <p>Rapikan jenggot dengan hot towel dan oil treatment.</p>
                    <span class="price">Rp 50.000</span>
                </div>
            </div>

            <div class="service-card">
                
                <img src="https://images.unsplash.com/photo-1503951914875-452162b0f3f1?q=80&w=800&auto=format&fit=crop" alt="Full Service">
                <div class="service-info">
                    <h3>The Full Package</h3>
                    <p>Haircut + Shave + Black Mask + Massage.</p>
                    <span class="price">Rp 150.000</span>
                </div>
            </div>
        </div>
    </section>

    <section class="reviews">
        <div class="section-title">
            <h2>Kata Pelanggan</h2>
        </div>
        <div class="review-grid">
            <div class="review-card">
                <div class="stars">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <p>"Tempatnya nyaman banget, barbernya ramah dan hasilnya sesuai ekspektasi. Best barber in town!"</p>
                <h4>- Andi Saputra</h4>
            </div>
            <div class="review-card">
                <div class="stars">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i>
                </div>
                <p>"Pelayanan premium dengan harga yang masuk akal. Booking lewat web gampang banget."</p>
                <h4>- Budi Santoso</h4>
            </div>
            <div class="review-card">
                <div class="stars">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <p>"Suka banget sama detail potongannya. Hot towel shavenya bikin rileks parah."</p>
                <h4>- Dimas Anggara</h4>
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 Barber Door Square. All Rights Reserved.</p>
    </footer>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>