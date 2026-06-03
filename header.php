<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <style>
        .site-header {
            height: var(--header-height);
            display: flex;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(8px);
            border-bottom: 1px solid var(--border);
            transition: all 0.3s ease;
        }

        .site-header.scrolled {
            height: 70px;
            box-shadow: var(--shadow-md);
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }

        .logo a {
            display: block;
        }

        .logo img {
            max-height: 55px;
            width: auto;
            display: block;
            transition: max-height 0.3s ease;
        }

        .site-header.scrolled .logo img {
            max-height: 45px;
        }

        .logo h1 {
            font-size: 1.5rem;
            color: var(--secondary);
            margin: 0;
        }

        .logo span {
            color: var(--primary);
        }

        .main-nav ul {
            display: flex;
            gap: 2rem;
        }

        .main-nav a {
            font-weight: 500;
            color: var(--text-main);
            font-size: 0.95rem;
        }

        .main-nav a:hover {
            color: var(--primary);
        }

        .header-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        @media (max-width: 768px) {
            .main-nav {
                display: none;
            }
        }
    </style>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header" id="main-header">
    <div class="container header-container">
        <div class="logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <!-- <h1>Taipas <span>Imóveis</span></h1> -->
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-full.webp" alt="logo">
            </a>
        </div>

        <nav class="main-nav">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'main-menu-list',
                'fallback_cb'    => 'taipas_menu_fallback',
            ) );
            ?>
        </nav>

        <div class="header-actions">
            <a href="https://wa.me/5511999999999" class="btn btn-primary">
                <i data-lucide="phone" style="width: 18px; margin-right: 8px;"></i>
                Fale Conosco
            </a>
        </div>
    </div>
</header>

<main style="padding-top: var(--header-height);">
