<?php
/**
 * The front page template
 */
get_header();
?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-overlay"></div>
    <div class="container hero-content">
        <h1 class="hero-title">Encontre o lugar ideal para sua <span>nova história</span></h1>
        <p class="hero-subtitle">As melhores opções de compra e locação na região de Taipas, Jaraguá e arredores.</p>
        
        <div class="hero-search glass-panel">
            <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" class="search-form">
                <div class="form-group">
                    <label><i data-lucide="tag"></i> Negócio</label>
                    <div class="radio-group-modern">
                        <input type="radio" name="negocio" id="hero-venda" value="venda" checked>
                        <label for="hero-venda">Comprar</label>
                        <input type="radio" name="negocio" id="hero-locacao" value="locacao">
                        <label for="hero-locacao">Alugar</label>
                    </div>
                </div>
                <div class="form-group">
                    <label><i data-lucide="home"></i> Tipo</label>
                    <div class="input-wrapper">
                        <select name="tipo">
                            <option value="">Qualquer tipo</option>
                            <?php
                            $tipos = get_terms([
                                'taxonomy' => 'tipo_imovel',
                                'hide_empty' => false,
                            ]);
                            if (!empty($tipos) && !is_wp_error($tipos)) {
                                foreach ($tipos as $tipo) {
                                    $tipo_imovel = ucfirst($tipo->slug);
                                    echo '<option value="' . esc_attr($tipo->slug) . '">' . esc_html($tipo_imovel) . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label><i data-lucide="map-pin"></i> Onde?</label>
                    <div class="input-wrapper">
                        <input type="text" name="localizacao" placeholder="Bairro ou Cidade">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i data-lucide="search" style="width: 20px; margin-right: 8px;"></i>
                    Pesquisar
                </button>
            </form>
        </div>
    </div>
</section>

<!-- Featured Properties -->
<section class="section-padding bg-soft">
    <div class="container">
        <div class="section-header">
            <h2>Imóveis em <span>Destaque</span></h2>
            <p>Confira nossas seleções exclusivas para você.</p>
        </div>

        <div class="property-grid">
            <?php
            $featured_query = new WP_Query( array(
                'post_type' => 'imovel',
                'posts_per_page' => 3,
            ) );

            if ( $featured_query->have_posts() ) :
                while ( $featured_query->have_posts() ) : $featured_query->the_post();
                    get_template_part( 'template-parts/content', 'imovel-card' );
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>Nenhum imóvel encontrado no momento.</p>';
            endif;
            ?>
        </div>
        
        <div class="text-center" style="margin-top: 3rem;">
            <a href="<?php echo get_post_type_archive_link('imovel'); ?>" class="btn btn-outline">Ver Todos os Imóveis</a>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="section-padding">
    <div class="container">
        <div class="features-grid">
            <div class="feature-card">
                <div class="icon-box"><i data-lucide="shield-check"></i></div>
                <h3>Segurança Total</h3>
                <p>Processos transparentes e assessoria jurídica completa em todas as etapas.</p>
            </div>
            <div class="feature-card">
                <div class="icon-box"><i data-lucide="banknote"></i></div>
                <h3>Financiamento Fácil</h3>
                <p>Correspondente Caixa autorizado. Aprovamos seu crédito com agilidade.</p>
            </div>
            <div class="feature-card">
                <div class="icon-box"><i data-lucide="map"></i></div>
                <h3>Especialistas Locais</h3>
                <p>Conhecemos cada detalhe da nossa região para oferecer o melhor para você.</p>
            </div>
        </div>
    </div>
</section>

<style>
    .hero-section {
        height: 80vh;
        min-height: 600px;
        background-image: url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&q=80&w=2000');
        background-size: cover;
        background-position: center;
        position: relative;
        display: flex;
        align-items: center;
        color: white;
    }

    .hero-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to bottom, rgba(0,0,0,0.4), rgba(0,0,0,0.1));
    }

    .hero-content {
        position: relative;
        z-index: 10;
        max-width: 900px;
    }

    .hero-title {
        font-size: 4rem;
        margin-bottom: 1rem;
        line-height: 1.1;
    }

    .hero-title span {
        color: var(--primary);
    }

    .hero-subtitle {
        font-size: 1.25rem;
        margin-bottom: 3rem;
        opacity: 0.9;
    }

    .hero-search {
        padding: 1.5rem;
    }

    .search-form {
        display: grid;
        grid-template-columns: 1fr 1fr 1.5fr auto;
        gap: 1.5rem;
        align-items: flex-end;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .form-group label {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        color: var(--text-muted);
    }
    
    .form-group label i {
        width: 16px;
        height: 16px;
        color: var(--primary);
    }

    .form-group select, .form-group input {
        padding: 0.75rem;
        border-radius: 8px;
        border: 1px solid var(--border);
        background: white;
        font-family: inherit;
        font-size: 1rem;
    }

    .section-header {
        text-align: center;
        margin-bottom: 4rem;
    }

    .section-header h2 {
        font-size: 2.5rem;
        margin-bottom: 0.5rem;
    }

    .section-header h2 span {
        color: var(--primary);
    }

    .property-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2rem;
    }

    .features-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 3rem;
    }

    .feature-card {
        text-align: center;
    }

    .icon-box {
        width: 64px;
        height: 64px;
        background: var(--bg-soft);
        color: var(--primary);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
    }

    .icon-box i {
        width: 32px;
        height: 32px;
    }

    .bg-soft { background-color: var(--bg-soft); }
    .text-center { text-align: center; }

    @media (max-width: 1024px) {
        .property-grid, .features-grid { grid-template-columns: repeat(2, 1fr); }
        .hero-title { font-size: 3rem; }
        .search-form { grid-template-columns: 1fr 1fr; }
    }

    @media (max-width: 640px) {
        .property-grid, .features-grid { grid-template-columns: 1fr; }
        .hero-title { font-size: 2.5rem; }
        .search-form { grid-template-columns: 1fr; }
    }
</style>

<?php get_footer(); ?>
