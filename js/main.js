document.addEventListener('DOMContentLoaded', () => {
    // Initialize Lucide Icons
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }

    // Header Scroll Effect
    const header = document.getElementById('main-header');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });

    // Price Range Slider Interaction
    const priceSlider = document.getElementById('price-slider');
    const priceValue = document.getElementById('price-value');

    if (priceSlider && priceValue) {
        priceSlider.addEventListener('input', (e) => {
            const value = parseInt(e.target.value);
            if (value >= 1000000) {
                priceValue.textContent = `R$ ${(value / 1000000).toFixed(1)}M`;
            } else {
                priceValue.textContent = `R$ ${value / 1000}k`;
            }
        });
    }

    // Initialize PhotoSwipe Lightbox
    if (typeof PhotoSwipeLightbox !== 'undefined') {
        const lightbox = new PhotoSwipeLightbox({
            gallery: '#property-gallery',
            children: 'a',
            pswpModule: PhotoSwipe
        });
        lightbox.init();
    }
});
