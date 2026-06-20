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
                    <form action="<?php echo esc_url( get_post_type_archive_link( 'imovel' ) ); ?>" method="GET" class="sidebar-form">
                        <div class="form-group">
                            <label>Negócio</label>
                            <div class="radio-group-modern">
                                <?php $current_negocio = isset( $_GET['negocio'] ) ? sanitize_text_field( $_GET['negocio'] ) : ''; ?>
                                <input type="radio" name="negocio" value="" id="todos_negocios" <?php checked( $current_negocio, '' ); ?>>
                                <label for="todos_negocios">Todos</label>
                                <input type="radio" name="negocio" value="venda" id="venda" <?php checked( $current_negocio, 'venda' ); ?>>
                                <label for="venda">Venda</label>
                                <input type="radio" name="negocio" value="locacao" id="locacao" <?php checked( $current_negocio, 'locacao' ); ?>>
                                <label for="locacao">Locação</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label><i data-lucide="home"></i> Tipo de Imóvel</label>
                            <div class="input-wrapper">
                                <?php
                                $current_tipo = isset( $_GET['tipo'] ) ? sanitize_text_field( $_GET['tipo'] ) : '';
                                $tipos_imovel = get_terms( array( 'taxonomy' => 'tipo_imovel', 'hide_empty' => false ) );
                                ?>
                                <select name="tipo">
                                    <option value="">Todos os tipos</option>
                                    <?php if ( ! is_wp_error( $tipos_imovel ) && ! empty( $tipos_imovel ) ) : ?>
                                        <?php foreach ( $tipos_imovel as $term ) : ?>
                                            <option value="<?php echo esc_attr( $term->slug ); ?>" <?php selected( $current_tipo, $term->slug ); ?>><?php echo esc_html( $term->name ); ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label><i data-lucide="bed"></i> Dormitórios</label>
                            <div class="input-wrapper">
                                <?php $current_quartos = isset( $_GET['quartos'] ) ? sanitize_text_field( $_GET['quartos'] ) : ''; ?>
                                <select name="quartos">
                                    <option value="">Qualquer</option>
                                    <option value="1" <?php selected( $current_quartos, '1' ); ?>>1+</option>
                                    <option value="2" <?php selected( $current_quartos, '2' ); ?>>2+</option>
                                    <option value="3" <?php selected( $current_quartos, '3' ); ?>>3+</option>
                                    <option value="4" <?php selected( $current_quartos, '4' ); ?>>4+</option>
                                </select>
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
                    <?php global $wp_query; ?>
                    <span>Encontrados: <strong><?php echo esc_html( $wp_query->found_posts ); ?> imóveis</strong></span>
                    <select onchange="if(this.value) { window.location.href=this.value; }">
                        <option value="">Ordenar por</option>
                        <option value="<?php echo esc_url( add_query_arg( 'orderby', 'date' ) ); ?>">Mais recentes</option>
                        <option value="<?php echo esc_url( add_query_arg( 'orderby', 'title' ) ); ?>">Alfabética</option>
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
        grid-template-columns: 350px 1fr;
        gap: 3rem;
    }

    .sidebar-box { padding: 2rem; }
    .sidebar-box h3 { margin-bottom: 1.5rem; font-size: 1.25rem; }

    .sidebar-form .form-group { margin-bottom: 1.5rem; }
    .sidebar-form label { display: flex; font-size: 0.8rem; font-weight: 700; text-transform: uppercase; margin-bottom: 0.5rem; color: var(--text-muted); }
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
