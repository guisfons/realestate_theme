</main>

<footer class="site-footer">
    <div class="container section-padding">
        <div class="footer-grid">
            <div class="footer-info">
                <figure class="footer-logo"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-full.webp" alt="logo"></figure>
                <p><?php echo wp_kses_post( get_theme_mod( 'footer_text', 'Especialistas em realizar sonhos na região de Taipas e Jaraguá. Atendimento personalizado e as melhores opções de financiamento.' ) ); ?></p>
                <?php if ( get_theme_mod( 'creci_number', 'CRECI: 00000-J' ) ) : ?>
                    <p class="creci-footer" style="font-weight: 600; margin-bottom: 1rem;"><?php echo esc_html( get_theme_mod( 'creci_number', 'CRECI: 00000-J' ) ); ?></p>
                <?php endif; ?>
                <div class="social-links">
                    <a href="#"><i data-lucide="instagram"></i></a>
                    <a href="#"><i data-lucide="facebook"></i></a>
                    <a href="#"><i data-lucide="linkedin"></i></a>
                </div>

                <div class="footer-partners">
                    <p>Financiamento com:</p>
                    <div class="partner-icons">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Caixa_Econ%C3%B4mica_Federal_logo_1997.svg/1920px-Caixa_Econ%C3%B4mica_Federal_logo_1997.svg.png" alt="Caixa">
                        <img src="https://upload.wikimedia.org/wikipedia/pt/thumb/f/f2/Logo_Ita%C3%BA.svg/1200px-Logo_Ita%C3%BA.svg.png" alt="Itaú">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/Banco_Bradesco_logo.svg/2560px-Banco_Bradesco_logo.svg.png" alt="Bradesco">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b3/Santander_Logo.svg/2560px-Santander_Logo.svg.png" alt="Santander">
                    </div>
                </div>
            </div>
            
            <div class="footer-nav">
                <h4>Navegação</h4>
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'footer',
                    'container'      => false,
                    'fallback_cb'    => false,
                ) );
                ?>
            </div>

            <div class="footer-contact">
                <h4>Contato</h4>
                <ul>
                    <?php if ( get_theme_mod( 'contact_address', 'Av. Raimundo Pereira de Magalhães, 1234' ) ) : ?>
                        <li><i data-lucide="map-pin"></i> <?php echo get_theme_mod( 'contact_address', 'Av. Raimundo Pereira de Magalhães, 1234' ); ?></li>
                    <?php endif; ?>
                    <?php if ( get_theme_mod( 'contact_phone', '(11) 3941-0000' ) ) : ?>
                        <li><i data-lucide="phone"></i> <?php echo get_theme_mod( 'contact_phone', '(11) 3941-0000' ); ?></li>
                    <?php endif; ?>
                    <?php if ( get_theme_mod( 'contact_email', 'contato@taipasimoveis.com.br' ) ) : ?>
                        <li><i data-lucide="mail"></i> <a href="mailto:<?php echo antispambot( get_theme_mod( 'contact_email', 'contato@taipasimoveis.com.br' ) ); ?>" style="color: inherit; text-decoration: none;"><?php echo antispambot( get_theme_mod( 'contact_email', 'contato@taipasimoveis.com.br' ) ); ?></a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> <?php echo get_bloginfo('name'); ?>. Todos os direitos reservados.</p>
        </div>
    </div>
</footer>

<style>
    .site-footer {
        background-color: var(--secondary);
        color: white;
        margin-top: 5rem;
    }

    .footer-grid {
        display: grid;
        grid-template-columns: 2fr 1fr 1fr;
        gap: 4rem;
    }

    .footer-info h3 {
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .footer-info h3 span {
        color: var(--primary);
    }

    .footer-logo {
        margin-bottom: 1.5rem;
        display: block;
    }

    .footer-logo img {
        max-height: 150px;
        width: auto;
        display: block;
    }

    .footer-info p {
        color: #CBD5E1;
        margin-bottom: 2rem;
        max-width: 400px;
    }

    .social-links {
        display: flex;
        gap: 1rem;
    }

    .social-links a {
        background: rgba(255, 255, 255, 0.1);
        padding: 0.5rem;
        border-radius: 50%;
        display: flex;
        transition: 0.3s;
    }

    .social-links a:hover {
        background: var(--primary);
        transform: translateY(-3px);
    }

    .footer-nav h4, .footer-contact h4 {
        font-size: 1.1rem;
        margin-bottom: 1.5rem;
        color: white;
    }

    .footer-nav ul li, .footer-contact ul li {
        margin-bottom: 0.75rem;
        color: #CBD5E1;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .footer-contact i {
        width: 18px;
        color: var(--primary);
    }

    .footer-partners {
        margin-top: 2.5rem;
    }

    .footer-partners p {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: #94A3B8;
        margin-bottom: 1rem;
    }

    .partner-icons {
        display: flex;
        gap: 1.5rem;
        align-items: center;
        flex-wrap: wrap;
    }

    .partner-icons img {
        height: 20px;
        filter: brightness(0) invert(1);
        opacity: 0.6;
        transition: 0.3s;
    }

    .partner-icons img:hover {
        opacity: 1;
    }

    .footer-bottom {
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        padding: 1.5rem 0;
        text-align: center;
        color: #94A3B8;
        font-size: 0.875rem;
    }

    @media (max-width: 768px) {
        .footer-grid {
            grid-template-columns: 1fr;
            gap: 2rem;
        }
    }
</style>

<?php wp_footer(); ?>
</body>
</html>
