document.addEventListener('DOMContentLoaded', function() {
    
    // Smooth Scroll untuk tombol Hero
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    // Animasi Navbar saat di scroll
    const navbar = document.querySelector('.navbar');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.style.background = '#000000'; // Lebih gelap saat scroll
            navbar.style.padding = '1rem 5%';
        } else {
            navbar.style.background = '#121212'; // Warna asli
            navbar.style.padding = '1.5rem 5%';
        }
    });

    // Hover effect untuk card (opsional, menambah interaktivitas JS)
    const cards = document.querySelectorAll('.service-card');
    cards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.borderColor = '#d4af37';
        });
        card.addEventListener('mouseleave', () => {
            card.style.borderColor = 'transparent';
        });
    });
});