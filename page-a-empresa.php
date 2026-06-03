<?php
/**
 * Template Name: A Empresa
 */
get_header();
?>

<section class="page-header section-padding">
    <div class="container">
        <h1>Nossa <span>História</span></h1>
        <p>Conheça a trajetória da Taipas Imóveis, sua parceira de confiança.</p>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <div class="about-grid">
            <div class="about-text">
                <h2>Há mais de 10 anos transformando <span>sonhos em realidade</span>.</h2>
                <p>A Taipas Imóveis nasceu com o propósito de simplificar o mercado imobiliário na região de Taipas e Jaraguá. Com uma equipe experiente e dedicada, oferecemos soluções completas para quem deseja comprar, vender ou alugar um imóvel.</p>
                <p>Nossa missão é proporcionar transparência e segurança em cada negociação, garantindo que nossos clientes façam o melhor investimento possível.</p>
                
                <div class="stats-grid">
                    <div class="stat-item">
                        <span class="stat-number">10+</span>
                        <span class="stat-label">Anos de Experiência</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">500+</span>
                        <span class="stat-label">Imóveis Vendidos</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">1k+</span>
                        <span class="stat-label">Clientes Satisfeitos</span>
                    </div>
                </div>
            </div>
            <div class="about-image">
                <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?auto=format&fit=crop&q=80&w=1000" alt="Equipe Taipas Imóveis" class="rounded-lg shadow-lg">
            </div>
        </div>
    </div>
</section>

<section class="section-padding bg-soft">
    <div class="container">
        <div class="mission-vision-values">
            <div class="mvv-card glass-panel">
                <i data-lucide="target"></i>
                <h3>Missão</h3>
                <p>Atender com excelência e ética, superando expectativas e realizando o sonho da casa própria.</p>
            </div>
            <div class="mvv-card glass-panel">
                <i data-lucide="eye"></i>
                <h3>Visão</h3>
                <p>Ser referência em excelência no mercado imobiliário da Zona Norte de São Paulo.</p>
            </div>
            <div class="mvv-card glass-panel">
                <i data-lucide="heart"></i>
                <h3>Valores</h3>
                <p>Ética, Transparência, Comprometimento e Foco no Cliente.</p>
            </div>
        </div>
    </div>
</section>

<style>
    .page-header {
        background: var(--secondary);
        color: white;
        text-align: center;
        padding: 6rem 0;
    }
    .page-header h1 span { color: var(--primary); }
    .page-header p { opacity: 0.8; font-size: 1.1rem; }

    .about-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 4rem;
        align-items: center;
    }

    .about-text h2 { font-size: 2.5rem; margin-bottom: 1.5rem; }
    .about-text h2 span { color: var(--primary); }
    .about-text p { margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-muted); }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.5rem;
        margin-top: 3rem;
    }

    .stat-item { text-align: center; }
    .stat-number { display: block; font-size: 2.5rem; font-weight: 800; color: var(--primary); font-family: 'Outfit', sans-serif; }
    .stat-label { font-size: 0.875rem; color: var(--secondary); font-weight: 600; text-transform: uppercase; }

    .about-image img { border-radius: 24px; }

    .mission-vision-values {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2rem;
    }

    .mvv-card {
        padding: 3rem 2rem;
        text-align: center;
    }

    .mvv-card i {
        width: 54px;
        height: 54px;
        color: var(--primary);
        margin: 0 auto 1.5rem;
        display: block;
    }

    .mvv-card h3 { margin-bottom: 1rem; font-size: 1.5rem; }

    @media (max-width: 1024px) {
        .about-grid { grid-template-columns: 1fr; }
        .mission-vision-values { grid-template-columns: 1fr; }
    }
</style>

<?php get_footer(); ?>
