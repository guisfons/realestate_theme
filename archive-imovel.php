<?php
/**
 * The template for displaying property archives
 */
get_header();
?>

<section class="section-padding bg-soft">
    <div class="container">
        <header class="archive-header">
            <h1>Imóveis em <span>Destaque</span></h1>
            <p>Encontre o imóvel que você sempre sonhou em nossa listagem completa.</p>
        </header>

        <div class="archive-layout">
            <!-- Filters Sidebar -->
            <aside class="filters-sidebar">
                <div class="glass-panel sidebar-box">
                    <h3><i data-lucide="filter"></i> Filtros</h3>
                    <form action="#" class="sidebar-form">
                        <div class="form-group">
                            <label>Negócio</label>
                            <div class="radio-group-modern">
                                <input type="radio" name="negocio" id="venda" checked>
                                <label for="venda">Venda</label>
                                <input type="radio" name="negocio" id="locacao">
                                <label for="locacao">Locação</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label><i data-lucide="home"></i> Tipo de Imóvel</label>
                            <div class="input-wrapper">
                                <select>
                                    <option>Todos os tipos</option>
                                    <option>Casa</option>
                                    <option>Apartamento</option>
                                    <option>Terreno</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label><i data-lucide="bed"></i> Dormitórios</label>
                            <div class="input-wrapper">
                                <select>
                                    <option>Qualquer</option>
                                    <option>1+</option>
                                    <option>2+</option>
                                    <option>3+</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label><i data-lucide="dollar-sign"></i> Preço Máximo</label>
                            <div class="price-range-wrapper">
                                <input type="range" min="100000" max="2000000" step="50000" id="price-slider">
                                <div class="range-values">
                                    <span>R$ 100k</span>
                                    <span id="price-value" style="color: var(--primary); font-weight: 700;">R$ 1M</span>
                                    <span>R$ 2M+</span>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-full">
                            Filtrar Imóveis
                        </button>
                    </form>
                </div>
            </aside>

            <!-- Results -->
            <div class="archive-results">
                <div class="results-meta">
                    <span>Encontrados: <strong>24 imóveis</strong></span>
                    <select>
                        <option>Mais recentes</option>
                        <option>Menor preço</option>
                        <option>Maior preço</option>
                    </select>
                </div>

                <div class="property-grid">
                    <?php
                    if ( have_posts() ) :
                        while ( have_posts() ) : the_post();
                            get_template_part( 'template-parts/content', 'imovel-card' );
                        endwhile;
                    else :
                        echo '<p>Nenhum imóvel encontrado.</p>';
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .archive-header { margin-bottom: 4rem; text-align: center; }
    .archive-header h1 { font-size: 3rem; margin-bottom: 0.5rem; }
    .archive-header h1 span { color: var(--primary); }

    .archive-layout {
        display: grid;
        grid-template-columns: 280px 1fr;
        gap: 3rem;
    }

    .sidebar-box { padding: 2rem; }
    .sidebar-box h3 { margin-bottom: 1.5rem; font-size: 1.25rem; }

    .sidebar-form .form-group { margin-bottom: 1.5rem; }
    .sidebar-form label { display: block; font-size: 0.8rem; font-weight: 700; text-transform: uppercase; margin-bottom: 0.5rem; color: var(--text-muted); }
    .sidebar-form select, .sidebar-form input[type="range"] { width: 100%; padding: 0.5rem; }

    .radio-group { display: flex; gap: 1rem; }
    .radio-group label { text-transform: none; font-weight: 500; display: flex; align-items: center; gap: 0.25rem; cursor: pointer; color: var(--text-main); }

    .results-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid var(--border);
    }

    .results-meta select { border: none; background: transparent; font-weight: 600; color: var(--secondary); cursor: pointer; }

    .property-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 2rem;
    }

    @media (max-width: 1024px) {
        .archive-layout { grid-template-columns: 1fr; }
        .filters-sidebar { display: none; }
        .property-grid { grid-template-columns: repeat(2, 1fr); }
    }

    @media (max-width: 640px) {
        .property-grid { grid-template-columns: 1fr; }
    }
</style>

<?php get_footer(); ?>
