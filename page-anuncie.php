<?php
/**
 * Template Name: Anuncie seu Imóvel
 */
get_header();
?>

<section class="anuncie-hero">
    <div class="container">
        <div class="hero-flex">
            <div class="hero-text">
                <h1>Quer <span>vender ou alugar</span> seu imóvel com rapidez?</h1>
                <p>Nós cuidamos de tudo para você. Anuncie hoje mesmo na maior imobiliária da região.</p>
                <ul class="benefits-list">
                    <li><i data-lucide="check-circle"></i> Fotos profissionais gratuitas</li>
                    <li><i data-lucide="check-circle"></i> Anúncio nos maiores portais</li>
                    <li><i data-lucide="check-circle"></i> Assessoria completa</li>
                </ul>
            </div>
            
            <div class="form-container glass-panel">
                <h3>Dados do Imóvel</h3>
                <form action="#" class="anuncie-form">
                    <div class="form-group">
                        <input type="text" placeholder="Seu Nome Completo" required>
                    </div>
                    <div class="form-group">
                        <input type="email" placeholder="Seu E-mail" required>
                    </div>
                    <div class="form-group">
                        <input type="tel" placeholder="Seu WhatsApp" required>
                    </div>
                    <div class="form-group">
                        <select required>
                            <option value="">Tipo de Imóvel</option>
                            <option value="casa">Casa</option>
                            <option value="apartamento">Apartamento</option>
                            <option value="terreno">Terreno</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Endereço do Imóvel" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-full">Solicitar Avaliação Grátis</button>
                </form>
            </div>
        </div>
    </div>
</section>

<style>
    .anuncie-hero {
        background: var(--bg-soft);
        padding: 8rem 0;
        background-image: radial-gradient(circle at top right, rgba(200, 16, 46, 0.05), transparent);
    }

    .hero-flex {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 4rem;
        align-items: center;
    }

    .hero-text h1 { font-size: 3.5rem; margin-bottom: 1.5rem; }
    .hero-text h1 span { color: var(--primary); }
    .hero-text p { font-size: 1.25rem; color: var(--text-muted); margin-bottom: 2rem; }

    .benefits-list { margin-bottom: 2rem; }
    .benefits-list li { display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1rem; font-weight: 600; color: var(--secondary); }
    .benefits-list i { color: #10B981; }

    .form-container {
        padding: 3rem;
        box-shadow: var(--shadow-lg);
    }

    .form-container h3 { margin-bottom: 2rem; text-align: center; font-size: 1.5rem; }

    .anuncie-form .form-group { margin-bottom: 1rem; }
    .anuncie-form input, .anuncie-form select {
        width: 100%;
        padding: 0.875rem;
        border: 1px solid var(--border);
        border-radius: 8px;
        font-family: inherit;
    }

    @media (max-width: 900px) {
        .hero-flex { grid-template-columns: 1fr; text-align: center; }
        .hero-text h1 { font-size: 2.5rem; }
        .benefits-list { display: inline-block; text-align: left; }
    }
</style>

<?php get_footer(); ?>
