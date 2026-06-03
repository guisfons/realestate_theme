<article class="property-card">
    <div class="card-image">
        <?php 
        $thumb_url = get_post_meta( get_the_ID(), '_thumbnail_url', true );
        if ( has_post_thumbnail() ) : 
            the_post_thumbnail( 'large' ); 
        elseif ( $thumb_url ) : ?>
            <img src="<?php echo esc_url($thumb_url); ?>" alt="<?php the_title(); ?>">
        <?php else : ?>
            <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&q=80&w=800" alt="Imóvel">
        <?php endif; ?>
        <div class="card-tag">
            <?php
            $terms = get_the_terms( get_the_ID(), 'tipo_negocio' );
            echo $terms ? esc_html( $terms[0]->name ) : 'Imóvel';
            ?>
        </div>
    </div>
    
    <div class="card-content">
        <div class="card-price"><?php echo get_post_meta( get_the_ID(), '_price', true ) ?: 'Sob Consulta'; ?></div>
        <?php
        $custom_title = get_post_meta(get_the_ID(), '_property_title', true);
        $display_title = $custom_title ? $custom_title : get_the_title();
        ?>
        <h3 class="card-title"><a href="<?php the_permalink(); ?>"><?php echo esc_html($display_title); ?></a></h3>
        
        <div class="card-features">
            <span><i data-lucide="square"></i> <?php echo get_post_meta( get_the_ID(), '_area', true ) ?: 'N/A'; ?></span>
            <span><i data-lucide="bed"></i> <?php echo get_post_meta( get_the_ID(), '_beds', true ) ?: '0'; ?></span>
            <span><i data-lucide="bath"></i> <?php echo get_post_meta( get_the_ID(), '_baths', true ) ?: '0'; ?></span>
            <span><i data-lucide="car"></i> <?php echo get_post_meta( get_the_ID(), '_parking', true ) ?: '0'; ?></span>
        </div>
        
        <div class="card-footer">
            <a href="<?php the_permalink(); ?>" class="btn-text">Ver Detalhes <i data-lucide="arrow-right"></i></a>
        </div>
    </div>
</article>

<style>
    .property-card {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: var(--shadow-md);
        transition: 0.3s;
    }

    .property-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg);
    }

    .card-image {
        position: relative;
        height: 240px;
    }

    .card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .card-tag {
        position: absolute;
        top: 1rem;
        left: 1rem;
        background: var(--primary);
        color: white;
        padding: 0.25rem 0.75rem;
        border-radius: 4px;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
    }

    .card-content {
        padding: 1.5rem;
    }

    .card-price {
        font-size: 1.25rem;
        font-weight: 800;
        color: var(--primary);
        margin-bottom: 0.5rem;
    }

    .card-title {
        font-size: 1.1rem;
        margin-bottom: 0.5rem;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .card-location {
        font-size: 0.875rem;
        color: var(--text-muted);
        display: flex;
        align-items: center;
        gap: 0.4rem;
        margin-bottom: 1.25rem;
    }

    .card-location i { width: 16px; height: 16px; color: var(--primary); }

    .card-features {
        display: flex;
        justify-content: space-between;
        padding-top: 1rem;
        border-top: 1px solid var(--border);
        font-size: 0.875rem;
        color: var(--text-main);
    }

    .card-features span {
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }

    .card-features i { width: 18px; height: 18px; color: var(--text-muted); stroke-width: 1.5; }

    .card-footer {
        margin-top: 1.5rem;
    }

    .btn-text {
        color: var(--secondary);
        font-weight: 700;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-text i { width: 16px; transition: 0.2s; }
    .btn-text:hover i { transform: translateX(5px); }
</style>
