<?php
/**
 * Taipas Modern functions and definitions
 */

require get_template_directory() . '/inc/meta-boxes.php';

if ( ! function_exists( 'taipas_modern_setup' ) ) :
    function taipas_modern_setup() {
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
        add_theme_support( 'custom-logo' );

        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'taipas-modern' ),
            'footer'  => __( 'Footer Menu', 'taipas-modern' ),
        ) );
    }
endif;
add_action( 'after_setup_theme', 'taipas_modern_setup' );

/**
 * Enqueue scripts and styles
 */
function taipas_modern_scripts() {
    // Fonts
    wp_enqueue_style( 'taipas-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Outfit:wght@600;700;800&display=swap', array(), null );
    
    // Main Stylesheet
    wp_enqueue_style( 'taipas-style', get_stylesheet_uri(), array(), '1.0.0' );
    
    // Lucide Icons (UMD)
    wp_enqueue_script( 'lucide-icons', 'https://unpkg.com/lucide@0.468.0/dist/umd/lucide.min.js', array(), null, true );
    // PhotoSwipe Lightbox
    wp_enqueue_style( 'photoswipe-style', 'https://unpkg.com/photoswipe/dist/photoswipe.css', array(), null );
    wp_enqueue_script( 'photoswipe-js', 'https://unpkg.com/photoswipe/dist/umd/photoswipe.umd.min.js', array(), null, true );
    wp_enqueue_script( 'photoswipe-lightbox-js', 'https://unpkg.com/photoswipe/dist/umd/photoswipe-lightbox.umd.min.js', array('photoswipe-js'), null, true );

    wp_enqueue_script( 'taipas-main-js', get_template_directory_uri() . '/js/main.js', array('lucide-icons', 'photoswipe-lightbox-js'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'taipas_modern_scripts' );

/**
 * Enqueue admin scripts for media uploader
 */
function taipas_admin_scripts() {
    wp_enqueue_media();
}
add_action('admin_enqueue_scripts', 'taipas_admin_scripts');

/**
 * Register Custom Post Types: Imovel and Proprietario
 */
function taipas_register_custom_post_types() {
    // Register Imovel CPT
    $imovel_labels = array(
        'name'                  => _x( 'Imóveis', 'Post Type General Name', 'taipas-modern' ),
        'singular_name'         => _x( 'Imóvel', 'Post Type Singular Name', 'taipas-modern' ),
        'menu_name'             => __( 'Imóveis', 'taipas-modern' ),
        'name_admin_bar'        => __( 'Imóvel', 'taipas-modern' ),
        'archives'              => __( 'Arquivo de Imóveis', 'taipas-modern' ),
        'attributes'            => __( 'Atributos do Imóvel', 'taipas-modern' ),
        'parent_item_colon'     => __( 'Imóvel Pai:', 'taipas-modern' ),
        'all_items'             => __( 'Todos os Imóveis', 'taipas-modern' ),
        'add_new_item'          => __( 'Adicionar Novo Imóvel', 'taipas-modern' ),
        'add_new'               => __( 'Adicionar Novo', 'taipas-modern' ),
        'new_item'              => __( 'Novo Imóvel', 'taipas-modern' ),
        'edit_item'             => __( 'Editar Imóvel', 'taipas-modern' ),
        'update_item'           => __( 'Atualizar Imóvel', 'taipas-modern' ),
        'view_item'             => __( 'Ver Imóvel', 'taipas-modern' ),
        'view_items'            => __( 'Ver Imóveis', 'taipas-modern' ),
        'search_items'          => __( 'Buscar Imóvel', 'taipas-modern' ),
        'not_found'             => __( 'Não encontrado', 'taipas-modern' ),
        'not_found_in_trash'    => __( 'Não encontrado na lixeira', 'taipas-modern' ),
        'featured_image'        => __( 'Imagem de Destaque', 'taipas-modern' ),
        'set_featured_image'    => __( 'Definir imagem de destaque', 'taipas-modern' ),
        'remove_featured_image' => __( 'Remover imagem de destaque', 'taipas-modern' ),
        'use_featured_image'    => __( 'Usar como imagem de destaque', 'taipas-modern' ),
        'insert_into_item'      => __( 'Inserir no imóvel', 'taipas-modern' ),
        'uploaded_to_this_item' => __( 'Enviado para este imóvel', 'taipas-modern' ),
        'items_list'            => __( 'Lista de imóveis', 'taipas-modern' ),
        'items_list_navigation' => __( 'Navegação da lista de imóveis', 'taipas-modern' ),
        'filter_items_list'     => __( 'Filtrar lista de imóveis', 'taipas-modern' ),
    );
    $imovel_args = array(
        'label'                 => __( 'Imóvel', 'taipas-modern' ),
        'description'           => __( 'Post Type para Imóveis', 'taipas-modern' ),
        'labels'                => $imovel_labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-admin-home',
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'show_in_rest'          => true,
    );
    register_post_type( 'imovel', $imovel_args );

    // Register Proprietario CPT
    $proprietario_labels = array(
        'name'                  => _x( 'Proprietários', 'Post Type General Name', 'taipas-modern' ),
        'singular_name'         => _x( 'Proprietário', 'Post Type Singular Name', 'taipas-modern' ),
        'menu_name'             => __( 'Proprietários', 'taipas-modern' ),
        'name_admin_bar'        => __( 'Proprietário', 'taipas-modern' ),
        'all_items'             => __( 'Todos os Proprietários', 'taipas-modern' ),
        'add_new_item'          => __( 'Adicionar Novo Proprietário', 'taipas-modern' ),
        'add_new'               => __( 'Adicionar Novo', 'taipas-modern' ),
        'new_item'              => __( 'Novo Proprietário', 'taipas-modern' ),
        'edit_item'             => __( 'Editar Proprietário', 'taipas-modern' ),
        'update_item'           => __( 'Atualizar Proprietário', 'taipas-modern' ),
        'view_item'             => __( 'Ver Proprietário', 'taipas-modern' ),
        'view_items'            => __( 'Ver Proprietários', 'taipas-modern' ),
        'search_items'          => __( 'Buscar Proprietário', 'taipas-modern' ),
        'not_found'             => __( 'Não encontrado', 'taipas-modern' ),
        'not_found_in_trash'    => __( 'Não encontrado na lixeira', 'taipas-modern' ),
    );
    $proprietario_args = array(
        'label'                 => __( 'Proprietário', 'taipas-modern' ),
        'description'           => __( 'Post Type para Proprietários', 'taipas-modern' ),
        'labels'                => $proprietario_labels,
        'supports'              => array( 'title' ),
        'hierarchical'          => false,
        'public'                => false,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-businessman',
        'show_in_nav_menus'     => false,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => true,
        'publicly_queryable'    => false,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );
    register_post_type( 'proprietario', $proprietario_args );
}
add_action( 'init', 'taipas_register_custom_post_types', 0 );

/**
 * MOCK DATA GENERATION (Run Once)
 */
function create_taipas_mocks_once() {
    if ( get_option('taipas_mocks_created') ) return;

    $mocks = [
        [
            'title' => 'Casa Moderna no Jaraguá',
            'content' => 'Excelente casa com acabamento de alto padrão, localizada próxima ao Pico do Jaraguá. Possui quintal amplo e área gourmet.',
            'type' => 'casa',
            'business' => 'venda',
            'price' => 'R$ 550.000',
            'area' => '150m²',
            'beds' => 3,
            'baths' => 2,
            'parking' => 2,
            'image' => 'https://images.unsplash.com/photo-1580587771525-78b9dba3b914?auto=format&fit=crop&q=80&w=800'
        ],
        [
            'title' => 'Apartamento Vista Parque Taipas',
            'content' => 'Apartamento novo com varanda envidraçada, lazer completo no condomínio e segurança 24h.',
            'type' => 'apartamento',
            'business' => 'venda',
            'price' => 'R$ 320.000',
            'area' => '65m²',
            'beds' => 2,
            'baths' => 1,
            'parking' => 1,
            'image' => 'https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?auto=format&fit=crop&q=80&w=800'
        ],
        [
            'title' => 'Sobrado Espaçoso City Jaraguá',
            'content' => 'Sobrado com 3 suítes, sala de jantar separada e garagem coberta para 3 carros. Oportunidade única.',
            'type' => 'casa',
            'business' => 'venda',
            'price' => 'R$ 780.000',
            'area' => '220m²',
            'beds' => 4,
            'baths' => 4,
            'parking' => 3,
            'image' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&q=80&w=800'
        ],
        [
            'title' => 'Casa para Locação Parque Taipas',
            'content' => 'Casa térrea em rua tranquila, ideal para família pequena. Próxima a comércios e escolas.',
            'type' => 'casa',
            'business' => 'locacao',
            'price' => 'R$ 1.800 / mês',
            'area' => '80m²',
            'beds' => 2,
            'baths' => 1,
            'parking' => 1,
            'image' => 'https://images.unsplash.com/photo-1449844908441-8829872d2607?auto=format&fit=crop&q=80&w=800'
        ],
        [
            'title' => 'Studio Moderno próximo ao Rodoanel',
            'content' => 'Studio totalmente mobiliado com design industrial. Perfeito para solteiros ou casais jovens.',
            'type' => 'apartamento',
            'business' => 'locacao',
            'price' => 'R$ 2.200 / mês',
            'area' => '45m²',
            'beds' => 1,
            'baths' => 1,
            'parking' => 1,
            'image' => 'https://images.unsplash.com/photo-1536376074432-cd296455653c?auto=format&fit=crop&q=80&w=800'
        ],
        [
            'title' => 'Galpão Comercial Jaraguá',
            'content' => 'Amplo galpão para fins industriais ou logísticos. Pé direito alto e entrada para caminhões.',
            'type' => 'terreno',
            'business' => 'locacao',
            'price' => 'R$ 5.000 / mês',
            'area' => '500m²',
            'beds' => 0,
            'baths' => 2,
            'parking' => 5,
            'image' => 'https://images.unsplash.com/photo-1582268611958-ebfd161ef9cf?auto=format&fit=crop&q=80&w=800'
        ],
    ];

    foreach ($mocks as $mock) {
        $post_id = wp_insert_post([
            'post_title'   => $mock['title'],
            'post_content' => $mock['content'],
            'post_status'  => 'publish',
            'post_type'    => 'imovel',
        ]);

        if ($post_id) {
            wp_set_object_terms($post_id, $mock['type'], 'tipo_imovel');
            wp_set_object_terms($post_id, $mock['business'], 'tipo_negocio');
            update_post_meta($post_id, '_price', $mock['price']);
            update_post_meta($post_id, '_area', $mock['area']);
            update_post_meta($post_id, '_beds', $mock['beds']);
            update_post_meta($post_id, '_baths', $mock['baths']);
            update_post_meta($post_id, '_parking', $mock['parking']);
            update_post_meta($post_id, '_thumbnail_url', $mock['image']); // Added for easier access
        }
    }

    update_option('taipas_mocks_created', true);
}
add_action( 'init', 'create_taipas_mocks_once', 20 );

/**
 * Custom Taxonomies for Imovel
 */
function taipas_register_taxonomies() {
    // Tipo de Negócio (Venda / Locação)
    register_taxonomy( 'tipo_negocio', 'imovel', array(
        'label' => __( 'Tipo de Negócio', 'taipas-modern' ),
        'hierarchical' => true,
        'show_in_rest' => true,
    ) );

    // Tipo de Imóvel (Casa, Apto, Terreno)
    register_taxonomy( 'tipo_imovel', 'imovel', array(
        'label' => __( 'Tipo de Imóvel', 'taipas-modern' ),
        'hierarchical' => true,
        'show_in_rest' => true,
    ) );
}
add_action( 'init', 'taipas_register_taxonomies' );

/**
 * Auto-create essential pages
 */
function create_taipas_essential_pages() {
    $pages = array(
        'a-empresa' => array(
            'title'    => 'A Empresa',
            'template' => 'page-a-empresa.php'
        ),
        'pesquisa-completa' => array(
            'title'    => 'Pesquisa Completa',
            'template' => 'page-pesquisa.php'
        ),
        'financiamento' => array(
            'title'    => 'Financiamento',
            'template' => 'page-financiamento.php'
        ),
        'correspondente-bancario' => array(
            'title'    => 'Correspondente Bancário',
            'template' => 'page-correspondente.php'
        ),
        'fale-conosco' => array(
            'title'    => 'Fale Conosco',
            'template' => 'page-fale-conosco.php'
        ),
        'calculadora-de-financiamento' => array(
            'title'    => 'Calculadora de Financiamento',
            'template' => 'page-calculadora.php'
        ),
        'anuncie-seu-imovel' => array(
            'title'    => 'Anuncie seu Imóvel',
            'template' => 'page-anuncie.php'
        )
    );

    foreach ($pages as $slug => $data) {
        $page_exists = get_page_by_path($slug);
        if (!$page_exists) {
            $page_id = wp_insert_post(array(
                'post_title'   => $data['title'],
                'post_name'    => $slug,
                'post_status'  => 'publish',
                'post_type'    => 'page',
            ));
            if ($page_id) {
                update_post_meta($page_id, '_wp_page_template', $data['template']);
            }
        }
    }
}
add_action('after_switch_theme', 'create_taipas_essential_pages');
add_action('init', function() {
    if (isset($_GET['create_pages'])) {
        create_taipas_essential_pages();
    }
}, 30);

/**
 * Auto-create Menu
 */
function create_taipas_main_menu() {
    $menu_name = 'Menu Principal';
    $menu_exists = wp_get_nav_menu_object($menu_name);

    if (!$menu_exists) {
        $menu_id = wp_create_nav_menu($menu_name);

        // Add Home (Custom Link)
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title'  => 'Home',
            'menu-item-url'    => home_url('/'),
            'menu-item-status' => 'publish',
            'menu-item-type'   => 'custom',
        ));

        // Define pages to add
        $pages_to_add = array(
            'a-empresa'               => 'A Empresa',
            'imovel'                  => 'Imóveis', // This is the archive link
            'financiamento'           => 'Financiamento',
            'correspondente-bancario' => 'Caixa',
            'fale-conosco'            => 'Contato',
        );

        foreach ($pages_to_add as $slug => $title) {
            if ($slug === 'imovel') {
                wp_update_nav_menu_item($menu_id, 0, array(
                    'menu-item-title'  => $title,
                    'menu-item-url'    => get_post_type_archive_link('imovel'),
                    'menu-item-status' => 'publish',
                    'menu-item-type'   => 'custom',
                ));
                continue;
            }


            $page = get_page_by_path($slug);
            if ($page) {
                wp_update_nav_menu_item($menu_id, 0, array(
                    'menu-item-object-id' => $page->ID,
                    'menu-item-object'    => 'page',
                    'menu-item-type'      => 'post_type',
                    'menu-item-status'    => 'publish',
                ));
            }
        }

        // Assign menu to 'primary' location
        $locations = get_theme_mod('nav_menu_locations');
        $locations['primary'] = $menu_id;
        set_theme_mod('nav_menu_locations', $locations);
    }
}
add_action('after_switch_theme', 'create_taipas_main_menu', 20);
add_action('init', function() {
    if (isset($_GET['setup_menu'])) {
        create_taipas_main_menu();
    }
    
    // Update existing mocks with images
    if (isset($_GET['update_mocks'])) {
        $mocks_data = [
            'Casa Moderna no Jaraguá' => [
                'thumb' => 'https://images.unsplash.com/photo-1580587771525-78b9dba3b914?auto=format&fit=crop&q=80&w=1200',
                'gallery' => [
                    'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&q=80&w=1200',
                    'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?auto=format&fit=crop&q=80&w=1200',
                    'https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?auto=format&fit=crop&q=80&w=1200',
                    'https://images.unsplash.com/photo-1600210491474-5c4531f1d755?auto=format&fit=crop&q=80&w=1200',
                    'https://images.unsplash.com/photo-1600566752355-3979ff69a3bc?auto=format&fit=crop&q=80&w=1200'
                ]
            ],
            'Apartamento Vista Parque Taipas' => [
                'thumb' => 'https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?auto=format&fit=crop&q=80&w=1200',
                'gallery' => [
                    'https://images.unsplash.com/photo-1493809842364-78817add7ffb?auto=format&fit=crop&q=80&w=1200',
                    'https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?auto=format&fit=crop&q=80&w=1200',
                    'https://images.unsplash.com/photo-1502672023488-70e25813efdf?auto=format&fit=crop&q=80&w=1200'
                ]
            ],
            'Sobrado Espaçoso City Jaraguá' => [
                'thumb' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&q=80&w=1200',
                'gallery' => [
                    'https://images.unsplash.com/photo-1600585154526-990dcea464dd?auto=format&fit=crop&q=80&w=1200',
                    'https://images.unsplash.com/photo-1600047509807-ba8f99d2cdde?auto=format&fit=crop&q=80&w=1200',
                    'https://images.unsplash.com/photo-1600566753086-00f18fb6f3ea?auto=format&fit=crop&q=80&w=1200',
                    'https://images.unsplash.com/photo-1600566752355-3979ff69a3bc?auto=format&fit=crop&q=80&w=1200'
                ]
            ],
            'Casa para Locação Parque Taipas' => [
                'thumb' => 'https://images.unsplash.com/photo-1449844908441-8829872d2607?auto=format&fit=crop&q=80&w=1200',
                'gallery' => []
            ],
            'Studio Moderno próximo ao Rodoanel' => [
                'thumb' => 'https://images.unsplash.com/photo-1536376074432-cd296455653c?auto=format&fit=crop&q=80&w=1200',
                'gallery' => [
                    'https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af?auto=format&fit=crop&q=80&w=1200',
                    'https://images.unsplash.com/photo-1554995207-c18c203602cb?auto=format&fit=crop&q=80&w=1200'
                ]
            ],
            'Galpão Comercial Jaraguá' => [
                'thumb' => 'https://images.unsplash.com/photo-1582268611958-ebfd161ef9cf?auto=format&fit=crop&q=80&w=1200',
                'gallery' => [
                    'https://images.unsplash.com/photo-1504328345606-18bbc8c9d7d1?auto=format&fit=crop&q=80&w=1200'
                ]
            ]
        ];

        $properties = get_posts(['post_type' => 'imovel', 'posts_per_page' => -1]);
        foreach ($properties as $prop) {
            if (isset($mocks_data[$prop->post_title])) {
                $data = $mocks_data[$prop->post_title];
                update_post_meta($prop->ID, '_thumbnail_url', $data['thumb']);
                if (!empty($data['gallery'])) {
                    update_post_meta($prop->ID, '_property_gallery', implode(',', $data['gallery']));
                }
            }
        }
        echo "Mocks updated with rich galleries!";
        exit;
    }
}, 40);

/**
 * Add custom columns to Proprietário list
 */
function taipas_proprietario_columns($columns) {
    $new_columns = [];
    foreach ($columns as $key => $value) {
        $new_columns[$key] = $value;
        if ($key === 'title') {
            $new_columns['owner_phone'] = 'Telefone';
            $new_columns['related_properties'] = 'Imóveis Relacionados';
        }
    }
    return $new_columns;
}
add_filter('manage_proprietario_posts_columns', 'taipas_proprietario_columns');

function taipas_proprietario_custom_column($column, $post_id) {
    if ($column === 'owner_phone') {
        $phone = get_post_meta($post_id, '_owner_phone', true);
        echo esc_html($phone ?: '—');
    } elseif ($column === 'related_properties') {
        $properties = get_posts([
            'post_type' => 'imovel',
            'posts_per_page' => -1,
            'meta_query' => [
                [
                    'key' => '_proprietario_id',
                    'value' => $post_id,
                    'compare' => '='
                ]
            ]
        ]);
        if (!empty($properties)) {
            $links = [];
            foreach ($properties as $prop) {
                $links[] = sprintf(
                    '<a href="%s">%s</a>',
                    esc_url(get_edit_post_link($prop->ID)),
                    esc_html($prop->post_title)
                );
            }
            echo implode(', ', $links);
        } else {
            echo '—';
        }
    }
}
add_action('manage_proprietario_posts_custom_column', 'taipas_proprietario_custom_column', 10, 2);

/**
 * Add custom columns to Imóvel list
 */
function taipas_imovel_columns($columns) {
    $new_columns = [];
    if (isset($columns['cb'])) {
        $new_columns['cb'] = $columns['cb'];
    }
    
    $new_columns['property_thumb'] = 'Imagem';
    $new_columns['property_code'] = 'Código';
    $new_columns['property_price'] = 'Valor';
    $new_columns['property_owner'] = 'Proprietário';
    $new_columns['property_location'] = 'Localização';
    $new_columns['property_fees'] = 'Condomínio / IPTU';
    
    foreach ($columns as $key => $value) {
        if (!in_array($key, ['cb', 'title', 'tags', 'post_tag', 'taxonomy-post_tag'])) {
            $new_columns[$key] = $value;
        }
    }
    
    return $new_columns;
}
add_filter('manage_imovel_posts_columns', 'taipas_imovel_columns');

function taipas_imovel_primary_column( $default, $screen_id ) {
    if ( 'edit-imovel' === $screen_id ) {
        return 'property_code';
    }
    return $default;
}
add_filter('list_table_primary_column', 'taipas_imovel_primary_column', 10, 2);

function taipas_imovel_custom_column($column, $post_id) {
    if ($column === 'property_thumb') {
        if (has_post_thumbnail($post_id)) {
            echo get_the_post_thumbnail($post_id, [180, 120], ['style' => 'border-radius: 6px; object-fit: cover; width: 180px; height: 120px;']);
        } else {
            $thumb_url = get_post_meta($post_id, '_thumbnail_url', true);
            if ($thumb_url) {
                echo '<img src="' . esc_url($thumb_url) . '" style="border-radius: 6px; object-fit: cover; width: 180px; height: 120px;" alt="Thumbnail">';
            } else {
                echo '—';
            }
        }
    } elseif ($column === 'property_code') {
        $code = get_post_meta($post_id, '_property_code', true);
        $display = $code ? esc_html($code) : 'Sem Código';
        $edit_link = get_edit_post_link($post_id);
        echo '<strong><a class="row-title" href="' . esc_url($edit_link) . '">' . $display . '</a></strong>';
    } elseif ($column === 'property_price') {
        $price = get_post_meta($post_id, '_price', true);
        echo '<strong>' . esc_html($price ?: '—') . '</strong>';
    } elseif ($column === 'property_owner') {
        $owner_id = get_post_meta($post_id, '_proprietario_id', true);
        if ($owner_id) {
            $owner = get_post($owner_id);
            if ($owner) {
                echo sprintf(
                    '<a href="%s">%s</a>',
                    esc_url(get_edit_post_link($owner_id)),
                    esc_html($owner->post_title)
                );
            } else {
                echo '—';
            }
        } else {
            echo '—';
        }
    } elseif ($column === 'property_location') {
        $address = get_post_meta($post_id, '_address', true);
        $cep = get_post_meta($post_id, '_cep', true);
        if ($address && $cep) {
            echo esc_html($address) . '<br><span style="display:inline-block; margin-top:8px; color:#666; font-size:12px;">CEP: ' . esc_html($cep) . '</span>';
        } elseif ($address) {
            echo esc_html($address);
        } elseif ($cep) {
            echo '<span style="color:#666; font-size:12px;">CEP: ' . esc_html($cep) . '</span>';
        } else {
            echo '—';
        }
    } elseif ($column === 'property_fees') {
        $condo = get_post_meta($post_id, '_condo_fee', true);
        $iptu = get_post_meta($post_id, '_iptu_fee', true);
        $fees = [];
        if ($condo) $fees[] = 'Cond.: ' . esc_html($condo);
        if ($iptu) $fees[] = 'IPTU: ' . esc_html($iptu);
        echo !empty($fees) ? implode(' | ', $fees) : '—';
    }
}
add_action('manage_imovel_posts_custom_column', 'taipas_imovel_custom_column', 10, 2);

/**
 * Admin notices for Imovel
 */
function taipas_imovel_admin_notices() {
    $screen = get_current_screen();
    if ($screen && $screen->id === 'imovel') {
        if (get_transient('taipas_duplicate_code_' . get_current_user_id())) {
            echo '<div class="notice notice-error is-dismissible"><p><strong>Erro:</strong> Já existe um imóvel cadastrado com este Código. O código informado não foi salvo e precisa ser alterado.</p></div>';
            delete_transient('taipas_duplicate_code_' . get_current_user_id());
        }
    }
}
add_action('admin_notices', 'taipas_imovel_admin_notices');

/**
 * Custom CSS for Admin columns
 */
function taipas_admin_columns_css() {
    echo '<style>
        .column-property_thumb { width: 190px; }
        .column-property_code { width: 120px; }
        .column-property_price { width: 120px; }
        .column-property_location { width: 15%; }
    </style>';
}
add_action('admin_head', 'taipas_admin_columns_css');

/**
 * Register Print Ficha sidebar meta box
 */
function taipas_add_imovel_print_meta_box() {
    add_meta_box(
        'taipas_imovel_print',
        'Imprimir Ficha',
        'taipas_imovel_print_callback',
        'imovel',
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'taipas_add_imovel_print_meta_box');

function taipas_imovel_print_callback($post) {
    $print_url = add_query_arg([
        'print_ficha' => 1,
        'preview_id' => $post->ID
    ], get_permalink($post->ID));
    
    echo '<p style="margin: 0; padding: 5px 0;">';
    echo '<a href="' . esc_url($print_url) . '" class="button button-primary button-large" target="_blank" style="width: 100%; text-align: center; display: block; box-sizing: border-box;">';
    echo '<span class="dashicons dashicons-printer" style="vertical-align: middle; margin-right: 5px;"></span> ';
    echo 'Imprimir Ficha';
    echo '</a>';
    echo '</p>';
}

/**
 * Handle printing of the property sheet
 */
function taipas_handle_print_ficha() {
    if (isset($_GET['print_ficha']) && isset($_GET['preview_id'])) {
        $post_id = intval($_GET['preview_id']);
        
        // Check edit permission
        if (!current_user_can('edit_post', $post_id)) {
            wp_die('Você não tem permissão para visualizar esta ficha.');
        }

        $post = get_post($post_id);
        if (!$post || $post->post_type !== 'imovel') {
            wp_die('Imóvel não encontrado.');
        }

        // Fetch fields
        $price = get_post_meta($post_id, '_price', true) ?: 'Sob Consulta';
        $area = get_post_meta($post_id, '_area', true) ?: '—';
        $beds = get_post_meta($post_id, '_beds', true) ?: '0';
        $baths = get_post_meta($post_id, '_baths', true) ?: '0';
        $parking = get_post_meta($post_id, '_parking', true) ?: '0';
        $cep = get_post_meta($post_id, '_cep', true) ?: '—';
        $address = get_post_meta($post_id, '_address', true) ?: '—';
        $condo = get_post_meta($post_id, '_condo_fee', true) ?: '—';
        $iptu = get_post_meta($post_id, '_iptu_fee', true) ?: '—';

        // Get owner details
        $owner_id = get_post_meta($post_id, '_proprietario_id', true);
        $owner_name = '—';
        $owner_phone = '—';
        if ($owner_id) {
            $owner = get_post($owner_id);
            if ($owner) {
                $owner_name = $owner->post_title;
                $owner_phone = get_post_meta($owner_id, '_owner_phone', true) ?: '—';
            }
        }

        // Taxonomies
        $tipo_negocio_terms = get_the_terms($post_id, 'tipo_negocio');
        $tipo_negocio = $tipo_negocio_terms ? $tipo_negocio_terms[0]->name : 'Venda';

        $tipo_imovel_terms = get_the_terms($post_id, 'tipo_imovel');
        $tipo_imovel = $tipo_imovel_terms ? $tipo_imovel_terms[0]->name : 'Apartamento';

        // Load the print template view
        include get_template_directory() . '/template-parts/print-ficha.php';
        exit;
    }
}
add_action('template_redirect', 'taipas_handle_print_ficha');

/**
 * Advanced filters for Imovel CPT in WP Admin
 */
function taipas_imovel_admin_filters() {
    global $typenow;
    if ($typenow == 'imovel') {
        $taxonomies = array('tipo_negocio', 'tipo_imovel', 'category', 'post_tag');
        foreach ($taxonomies as $tax_slug) {
            $tax_obj = get_taxonomy($tax_slug);
            if (!$tax_obj) continue;
            
            $selected = isset($_GET[$tax_slug]) ? $_GET[$tax_slug] : '';
            wp_dropdown_categories(array(
                'show_option_all' => __('Todas as ' . $tax_obj->label),
                'taxonomy'        => $tax_slug,
                'name'            => $tax_slug,
                'orderby'         => 'name',
                'selected'        => $selected,
                'show_count'      => true,
                'hide_empty'      => false,
                'value_field'     => 'slug'
            ));
        }
    }
}
add_action('restrict_manage_posts', 'taipas_imovel_admin_filters');

/**
 * Theme Customizer Settings
 */
function taipas_modern_customize_register( $wp_customize ) {
    // Footer Section
    $wp_customize->add_section( 'taipas_footer_section', array(
        'title'       => __( 'Rodapé e Contatos', 'taipas-modern' ),
        'priority'    => 120,
    ) );

    // Footer Text Setting
    $wp_customize->add_setting( 'footer_text', array(
        'default'           => 'Especialistas em realizar sonhos na região de Taipas e Jaraguá. Atendimento personalizado e as melhores opções de financiamento.',
        'sanitize_callback' => 'wp_kses_post',
    ) );

    $wp_customize->add_control( 'footer_text', array(
        'label'    => __( 'Texto do Rodapé', 'taipas-modern' ),
        'section'  => 'taipas_footer_section',
        'type'     => 'textarea',
    ) );

    // Contact Address
    $wp_customize->add_setting( 'contact_address', array(
        'default'           => 'Av. Raimundo Pereira de Magalhães, 1234',
        'sanitize_callback' => 'wp_kses_post',
    ) );

    $wp_customize->add_control( 'contact_address', array(
        'label'    => __( 'Endereço', 'taipas-modern' ),
        'section'  => 'taipas_footer_section',
        'type'     => 'textarea',
    ) );

    // Contact Phone
    $wp_customize->add_setting( 'contact_phone', array(
        'default'           => '(11) 3941-0000',
        'sanitize_callback' => 'wp_kses_post',
    ) );

    $wp_customize->add_control( 'contact_phone', array(
        'label'    => __( 'Telefone', 'taipas-modern' ),
        'section'  => 'taipas_footer_section',
        'type'     => 'text',
    ) );

    // Contact Email
    $wp_customize->add_setting( 'contact_email', array(
        'default'           => 'contato@taipasimoveis.com.br',
        'sanitize_callback' => 'sanitize_email',
    ) );

    $wp_customize->add_control( 'contact_email', array(
        'label'    => __( 'E-mail', 'taipas-modern' ),
        'section'  => 'taipas_footer_section',
        'type'     => 'email',
    ) );
}
add_action( 'customize_register', 'taipas_modern_customize_register' );

/**
 * Handle custom search queries for Imovel archive
 */
function taipas_imovel_search_query( $query ) {
    if ( ! is_admin() && $query->is_main_query() && is_post_type_archive( 'imovel' ) ) {
        
        $potential_code = '';
        if ( ! empty( $_GET['sku'] ) ) {
            $potential_code = sanitize_text_field( $_GET['sku'] );
        } elseif ( ! empty( $_GET['localizacao'] ) ) {
            $potential_code = sanitize_text_field( $_GET['localizacao'] );
        }

        if ( $potential_code ) {
            global $wpdb;
            $code_match = $wpdb->get_var( $wpdb->prepare(
                "SELECT post_id FROM {$wpdb->postmeta} WHERE meta_key = '_property_code' AND meta_value = %s LIMIT 1",
                $potential_code
            ) );

            if ( $code_match ) {
                // Match exato de código! Ignora outros filtros (venda/locação, etc) e mostra só este imóvel.
                $query->set( 'post__in', array( $code_match ) );
                $query->set( 'tax_query', array() );
                $query->set( 'meta_query', array() );
                return;
            }
        }

        $meta_query = $query->get('meta_query') ?: array();
        $tax_query = $query->get('tax_query') ?: array();

        // 1. Negócio (Venda/Locação)
        if ( ! empty( $_GET['negocio'] ) ) {
            $tax_query[] = array(
                'taxonomy' => 'tipo_negocio',
                'field'    => 'slug',
                'terms'    => sanitize_text_field( $_GET['negocio'] ),
            );
        }

        // 2. Tipo de Imóvel (Casa, Apto, etc)
        if ( ! empty( $_GET['tipo'] ) ) {
            $tax_query[] = array(
                'taxonomy' => 'tipo_imovel',
                'field'    => 'slug',
                'terms'    => sanitize_text_field( $_GET['tipo'] ),
            );
        }

        // 3. Localização (Bairro, Cidade, CEP) OU Código do Imóvel (SKU / hero search)
        if ( ! empty( $_GET['localizacao'] ) ) {
            $query->set( 'custom_localizacao_search', sanitize_text_field( $_GET['localizacao'] ) );
        }

        // 4. Código do Imóvel Específico (Advanced Search - SKU)
        if ( ! empty( $_GET['sku'] ) ) {
            $meta_query[] = array(
                'key'     => '_property_code',
                'value'   => sanitize_text_field( $_GET['sku'] ),
                'compare' => 'LIKE'
            );
        }

        // 5. Quartos
        if ( ! empty( $_GET['quartos'] ) ) {
            $meta_query[] = array(
                'key'     => '_beds',
                'value'   => intval( $_GET['quartos'] ),
                'compare' => '>='
            );
        }

        // 6. Vagas
        if ( ! empty( $_GET['vagas'] ) ) {
            $meta_query[] = array(
                'key'     => '_parking',
                'value'   => intval( $_GET['vagas'] ),
                'compare' => '>='
            );
        }

        if ( ! empty( $tax_query ) ) {
            $query->set( 'tax_query', $tax_query );
        }
        
        if ( ! empty( $meta_query ) ) {
            $query->set( 'meta_query', $meta_query );
        }
    }
}
add_action( 'pre_get_posts', 'taipas_imovel_search_query' );

/**
 * Filter SQL to search across title, content, and specific meta fields for 'localizacao'
 */
add_filter('posts_join', function($join, $query) {
    global $wpdb;
    if ( ! is_admin() && $query->is_main_query() && $query->get('custom_localizacao_search') ) {
        $join .= " LEFT JOIN {$wpdb->postmeta} AS pm_loc ON {$wpdb->posts}.ID = pm_loc.post_id ";
    }
    return $join;
}, 10, 2);

add_filter('posts_where', function($where, $query) {
    global $wpdb;
    if ( ! is_admin() && $query->is_main_query() && $query->get('custom_localizacao_search') ) {
        $keyword = esc_sql( $wpdb->esc_like( $query->get('custom_localizacao_search') ) );
        $where .= " AND (
            ({$wpdb->posts}.post_title LIKE '%{$keyword}%')
            OR ({$wpdb->posts}.post_content LIKE '%{$keyword}%')
            OR (pm_loc.meta_key IN ('_address', '_cep', '_property_code') AND pm_loc.meta_value LIKE '%{$keyword}%')
        )";
    }
    return $where;
}, 10, 2);

add_filter('posts_groupby', function($groupby, $query) {
    global $wpdb;
    if ( ! is_admin() && $query->is_main_query() && $query->get('custom_localizacao_search') ) {
        $groupby = "{$wpdb->posts}.ID";
    }
    return $groupby;
}, 10, 2);
