<?php
/**
 * The template for displaying single property details
 */
get_header();
?>

<?php while (have_posts()):
    the_post(); ?>
    <article class="property-single">
        <!-- Gallery Section -->
        <section class="gallery-section">
            <div class="container">
                <div class="gallery-grid pswp-gallery" id="property-gallery">
                    <?php
                    $thumb_id = get_post_thumbnail_id();
                    $mock_thumb = get_post_meta(get_the_ID(), '_thumbnail_url', true);
                    $gallery_ids_str = get_post_meta(get_the_ID(), '_property_gallery', true);
                    $gallery_items = $gallery_ids_str ? explode(',', $gallery_ids_str) : [];

                    // All images for lightbox
                    $all_images = [];

                    // Handle Thumbnail (Native or Mock)
                    if ($thumb_id) {
                        $all_images[] = ['id' => $thumb_id, 'url' => wp_get_attachment_image_url($thumb_id, 'full')];
                    } elseif ($mock_thumb) {
                        $all_images[] = ['id' => null, 'url' => $mock_thumb];
                    }

                    // Handle Gallery Items (IDs or Mock URLs)
                    foreach ($gallery_items as $item) {
                        if (is_numeric($item)) {
                            $all_images[] = ['id' => $item, 'url' => wp_get_attachment_image_url($item, 'full')];
                        } else {
                            $all_images[] = ['id' => null, 'url' => $item];
                        }
                    }

                    $total_count = count($all_images);
                    ?>

                    <div class="main-image">
                        <?php
                        if ($total_count > 0) {
                            $first = $all_images[0];
                            $full_url = $first['url'];
                            $meta = $first['id'] ? wp_get_attachment_metadata($first['id']) : null;
                            echo '<a href="' . esc_url($full_url) . '" data-pswp-width="' . ($meta['width'] ?? 1200) . '" data-pswp-height="' . ($meta['height'] ?? 800) . '" target="_blank">';
                            echo '<img src="' . esc_url($full_url) . '" alt="Principal">';
                            echo '</a>';
                        } else {
                            $url = 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&q=80&w=1200';
                            echo '<a href="' . esc_url($url) . '" data-pswp-width="1200" data-pswp-height="800" target="_blank">';
                            echo '<img src="' . esc_url($url) . '" alt="Imóvel">';
                            echo '</a>';
                        }
                        ?>
                    </div>

                    <div class="side-images">
                        <?php
                        for ($i = 1; $i <= 2; $i++) {
                            if (isset($all_images[$i])) {
                                $item = $all_images[$i];
                                $full_url = $item['url'];
                                $meta = $item['id'] ? wp_get_attachment_metadata($item['id']) : null;

                                $is_third = ($i === 2);
                                $has_more = ($is_third && $total_count > 3);

                                echo '<a href="' . esc_url($full_url) . '" data-pswp-width="' . ($meta['width'] ?? 1200) . '" data-pswp-height="' . ($meta['height'] ?? 800) . '" target="_blank" class="gallery-item ' . ($has_more ? 'has-more' : '') . '">';
                                echo '<img src="' . esc_url($full_url) . '" alt="Interior">';
                                if ($has_more) {
                                    $remaining = $total_count - 3;
                                    echo '<div class="more-overlay"><span>+' . $remaining . ' fotos</span></div>';
                                }
                                echo '</a>';
                            } else {
                                // Placeholder for empty slot
                                $placeholders = [
                                    1 => 'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?auto=format&fit=crop&q=80&w=1200',
                                    2 => 'https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?auto=format&fit=crop&q=80&w=1200'
                                ];
                                $url = $placeholders[$i];
                                echo '<a href="' . esc_url($url) . '" data-pswp-width="1200" data-pswp-height="800" target="_blank" class="gallery-item placeholder">';
                                echo '<img src="' . esc_url($url) . '" alt="Placeholder">';
                                echo '</a>';
                            }
                        }

                        // Hidden images for lightbox (from index 3 onwards)
                        for ($i = 3; $i < $total_count; $i++) {
                            $item = $all_images[$i];
                            $full_url = $item['url'];
                            $meta = $item['id'] ? wp_get_attachment_metadata($item['id']) : null;
                            echo '<a href="' . esc_url($full_url) . '" data-pswp-width="' . ($meta['width'] ?? 1200) . '" data-pswp-height="' . ($meta['height'] ?? 800) . '" target="_blank" style="display:none;"></a>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-padding">
            <div class="container">
                <div class="property-layout">
                    <!-- Main Info -->
                    <div class="property-main">
                        <div class="property-header">
                            <div class="property-meta">
                                <?php
                                $terms = get_the_terms(get_the_ID(), 'tipo_negocio');
                                $tag_text = $terms ? esc_html($terms[0]->name) : 'Imóvel';
                                ?>
                                <span class="tag"><?php echo $tag_text; ?></span>
                                <?php
                                $custom_title = get_post_meta(get_the_ID(), '_property_title', true);
                                $custom_code = get_post_meta(get_the_ID(), '_property_code', true);
                                $display_title = $custom_title ? $custom_title : get_the_title();
                                $display_code = $custom_code ? $custom_code : ($custom_title ? get_the_title() : get_the_ID());
                                ?>
                                <span class="ref">REF: <?php echo esc_html($display_code); ?></span>
                            </div>
                            <h1><?php echo esc_html($display_title); ?></h1>
                        </div>

                        <div class="property-specs glass-panel">
                            <div class="spec-item">
                                <i data-lucide="square"></i>
                                <span>Área Útil</span>
                                <strong><?php echo get_post_meta(get_the_ID(), '_area', true) ?: 'N/A'; ?></strong>
                            </div>
                            <div class="spec-item">
                                <i data-lucide="bed"></i>
                                <span>Quartos</span>
                                <strong><?php echo get_post_meta(get_the_ID(), '_beds', true) ?: '0'; ?></strong>
                            </div>
                            <div class="spec-item">
                                <i data-lucide="bath"></i>
                                <span>Banheiros</span>
                                <strong><?php echo get_post_meta(get_the_ID(), '_baths', true) ?: '0'; ?></strong>
                            </div>
                            <div class="spec-item">
                                <i data-lucide="car"></i>
                                <span>Vagas</span>
                                <strong><?php echo get_post_meta(get_the_ID(), '_parking', true) ?: '0'; ?></strong>
                            </div>
                        </div>

                        <div class="property-description">
                            <h3>Descrição do Imóvel</h3>
                            <?php the_content(); ?>
                        </div>

                        <?php
                        $features = get_post_meta(get_the_ID(), '_features', true);
                        if (!empty($features) && is_array($features)):
                            ?>
                            <div class="property-features-list">
                                <h3>Diferenciais</h3>
                                <div class="features-grid">
                                    <?php foreach ($features as $feature): ?>
                                        <span><i data-lucide="check"></i> <?php echo esc_html($feature); ?></span>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Sidebar Contact -->
                    <aside class="property-sidebar">
                        <div class="contact-card glass-panel">
                            <div class="price">
                                <?php echo get_post_meta(get_the_ID(), '_price', true) ?: 'Sob Consulta'; ?></div>
                            <?php
                            $condo_fee = get_post_meta(get_the_ID(), '_condo_fee', true);
                            $iptu_fee = get_post_meta(get_the_ID(), '_iptu_fee', true);

                            $fees = [];
                            if (!empty($condo_fee)) {
                                $fees[] = 'Condomínio: ' . esc_html($condo_fee);
                            }
                            if (!empty($iptu_fee)) {
                                $fees[] = 'IPTU: ' . esc_html($iptu_fee);
                            }

                            if (!empty($fees)) {
                                echo '<p class="condo">' . implode(' • ', $fees) . '</p>';
                            }
                            ?>

                            <div class="agent-info">
                                <?php 
                                $display_type = get_theme_mod( 'specialist_display_type', 'broker' );
                                
                                if ( $display_type === 'broker' ) {
                                    $first_name = get_the_author_meta('first_name');
                                    $last_name = get_the_author_meta('last_name');
                                    $agent_name = trim($first_name . ' ' . $last_name);
                                    if (empty($agent_name)) {
                                        $agent_name = get_the_author_meta('display_name');
                                    }
                                } else {
                                    $agent_name = get_theme_mod( 'agency_name', 'Atendimento Taipas' );
                                }
                                ?>
                                <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($agent_name); ?>&background=C8102E&color=fff"
                                    alt="<?php echo esc_attr($agent_name); ?>">
                                <div>
                                    <strong><?php echo esc_html($agent_name); ?></strong>
                                    <span>Especialista Local</span>
                                </div>
                            </div>

                            <?php
                            $contact_phone = get_theme_mod('contact_phone', '(11) 3941-0000');
                            $clean_phone = preg_replace('/[^0-9]/', '', $contact_phone);

                            $contact_whatsapp = get_theme_mod('contact_whatsapp', '5511999999999');
                            $clean_whatsapp = preg_replace('/[^0-9]/', '', $contact_whatsapp);
                            
                            $wa_text = urlencode('Olá, vi o imóvel REF: ' . $display_code . ' e gostaria de mais informações.');
                            $wa_link = 'https://wa.me/' . $clean_whatsapp . '?text=' . $wa_text;
                            ?>
                            <a href="<?php echo esc_url($wa_link); ?>" class="btn btn-primary w-full"
                                style="margin-bottom: 1rem;" target="_blank" rel="noopener noreferrer">
                                <i data-lucide="message-circle" style="margin-right: 8px;"></i>
                                WhatsApp
                            </a>
                            <a href="tel:<?php echo esc_attr($clean_phone); ?>" class="btn btn-outline w-full">
                                <i data-lucide="phone" style="margin-right: 8px;"></i>
                                Ligar Agora
                            </a>

                            <div class="sidebar-help">
                                <p>Interessado neste imóvel? Agende uma visita sem compromisso.</p>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </section>
    </article>
<?php endwhile; ?>

<style>
    .gallery-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 1rem;
        height: 500px;
        max-height: 500px;
        margin-bottom: 2rem;
        overflow: hidden;
    }

    .main-image,
    .side-images {
        height: 100%;
        max-height: 100%;
        overflow: hidden;
    }

    .main-image a,
    .side-images a {
        display: block;
        width: 100%;
        height: 100%;
        max-height: 100%;
        overflow: hidden;
        border-radius: 12px;
    }

    .main-image img,
    .side-images img {
        width: 100%;
        height: 100%;
        max-height: 100%;
        object-fit: cover;
        border-radius: 12px;
    }

    .side-images {
        display: grid;
        grid-template-rows: 1fr 1fr;
        gap: 1rem;
    }

    .property-layout {
        display: grid;
        grid-template-columns: 1fr 380px;
        gap: 4rem;
    }

    .property-header {
        margin-bottom: 3rem;
    }

    .property-meta {
        display: flex;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .property-meta .tag {
        background: var(--primary);
        color: white;
        padding: 0.25rem 0.75rem;
        border-radius: 4px;
        font-weight: 700;
        font-size: 0.75rem;
        text-transform: uppercase;
    }

    .property-meta .ref {
        color: var(--text-muted);
        font-size: 0.75rem;
        font-weight: 600;
    }

    .property-header h1 {
        font-size: 2.5rem;
        margin-bottom: 0.75rem;
        color: var(--secondary);
        line-height: 1.2;
    }

    .property-header .location {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--text-muted);
        font-size: 1.1rem;
    }

    .property-header .location i {
        width: 1.25rem;
        height: 1.25rem;
        color: var(--primary);
    }

    .property-specs {
        display: flex;
        justify-content: space-around;
        padding: 2.5rem 1.5rem;
        margin-bottom: 3.5rem;
        background: white;
        box-shadow: var(--shadow-sm);
        border-radius: 20px;
    }

    .gallery-item {
        position: relative;
        display: block;
        height: 100%;
    }

    .more-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.4);
        backdrop-filter: blur(2px);
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        transition: all 0.3s ease;
        opacity: 1;
        /* Always visible if present */
        pointer-events: none;
    }

    .more-overlay span {
        color: white;
        font-size: 1.4rem;
        font-weight: 700;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        transition: transform 0.3s ease;
    }

    .gallery-item.has-more:hover .more-overlay {
        background: rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(4px);
    }

    .gallery-item.has-more:hover .more-overlay span {
        transform: scale(1.1);
    }

    .gallery-item.placeholder img {
        opacity: 0.6;
        filter: grayscale(40%);
    }

    .spec-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        gap: 0.35rem;
    }

    .spec-item i {
        width: 26px;
        height: 26px;
        margin-bottom: 0.5rem;
        color: var(--primary);
        stroke-width: 1.5;
    }

    .spec-item span {
        font-size: 0.8rem;
        color: var(--text-muted);
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .spec-item strong {
        font-size: 1.35rem;
        color: var(--secondary);
        font-weight: 700;
    }

    .property-description {
        margin-bottom: 4rem;
        font-size: 1.1rem;
        line-height: 1.8;
        color: #475569;
    }

    .property-description h3,
    .property-features-list h3 {
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
        border-left: 4px solid var(--primary);
        padding-left: 1rem;
    }

    .features-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
    }

    .features-grid span {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        color: var(--text-main);
        font-weight: 500;
        font-size: 1rem;
    }

    .features-grid i {
        color: #10B981;
        width: 20px;
        height: 20px;
        flex-shrink: 0;
    }

    .contact-card {
        padding: 2.5rem;
        position: sticky;
        top: 120px;
    }

    .contact-card .price {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--primary);
        margin-bottom: 0.5rem;
    }

    .contact-card .condo {
        font-size: 0.875rem;
        color: var(--text-muted);
        margin-bottom: 2rem;
    }

    .agent-info {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 2rem;
        padding-top: 1.5rem;
        border-top: 1px solid var(--border);
    }

    .agent-info img {
        width: 48px;
        height: 48px;
        border-radius: 50%;
    }

    .agent-info strong {
        display: block;
        color: var(--secondary);
    }

    .agent-info span {
        font-size: 0.875rem;
        color: var(--text-muted);
    }

    .sidebar-help {
        margin-top: 2rem;
        font-size: 0.875rem;
        color: var(--text-muted);
        text-align: center;
    }

    @media (max-width: 1024px) {
        .property-layout {
            grid-template-columns: 1fr;
        }

        .property-sidebar {
            display: none;
        }

        .gallery-grid {
            height: 400px;
        }
    }

    @media (max-width: 640px) {
        .gallery-grid {
            grid-template-columns: 1fr;
            height: auto;
        }

        .side-images {
            display: none;
        }

        .property-header h1 {
            font-size: 2rem;
        }

        .property-specs {
            flex-wrap: wrap;
            gap: 2rem;
        }
    }
</style>

<?php get_footer(); ?>