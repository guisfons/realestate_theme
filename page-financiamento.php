<?php
/**
 * Template Name: Financiamento
 */
get_header();
?>

<section class="page-header section-padding">
    <div class="container">
        <h1>Crédito e <span>Financiamento</span></h1>
        <p>A orientação que você precisa para conquistar seu imóvel próprio.</p>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <div class="financing-intro">
            <div class="intro-content">
                <h2>O caminho para o seu novo lar <span>começa aqui</span>.</h2>
                <p>Entender as opções de financiamento é fundamental para fazer um bom negócio. Na Taipas Imóveis, ajudamos você a escolher a melhor linha de crédito, analisando taxas, prazos e condições que cabem no seu bolso.</p>
                
                <div class="bank-partners">
                    <p>Trabalhamos com os principais bancos:</p>
                    <div class="partners-logos">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d7/Logo_Caixa_Econ%C3%B4mica_Federal.svg/2560px-Logo_Caixa_Econ%C3%B4mica_Federal.svg.png" alt="Caixa">
                        <img src="https://upload.wikimedia.org/wikipedia/pt/thumb/f/f2/Logo_Ita%C3%BA.svg/1200px-Logo_Ita%C3%BA.svg.png" alt="Itaú">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/Banco_Bradesco_logo.svg/2560px-Banco_Bradesco_logo.svg.png" alt="Bradesco">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b3/Santander_Logo.svg/2560px-Santander_Logo.svg.png" alt="Santander">
                    </div>
                </div>
            </div>
        </div>

        <div class="info-blocks-grid">
            <div class="info-card glass-panel">
                <div class="icon-box-small"><i data-lucide="percent"></i></div>
                <h3>Menores Taxas</h3>
                <p>Pesquisamos em diversas instituições para encontrar a menor taxa de juros para o seu perfil.</p>
            </div>
            <div class="info-card glass-panel">
                <div class="icon-box-small"><i data-lucide="layers"></i></div>
                <h3>FGTS</h3>
                <p>Saiba como utilizar seu saldo do FGTS para abater o valor da entrada ou das parcelas.</p>
            </div>
            <div class="info-card glass-panel">
                <div class="icon-box-small"><i data-lucide="file-text"></i></div>
                <h3>Documentação</h3>
                <p>Orientamos sobre toda a lista de documentos necessários para a aprovação do crédito.</p>
            </div>
        </div>
    </div>
</section>

<section class="section-padding bg-soft">
    <div class="container">
        <div class="calculator-cta glass-panel">
            <div class="cta-content">
                <h2>Faça uma Simulação <span>Online</span></h2>
                <p>Use nossa ferramenta exclusiva para ter uma estimativa real das suas parcelas.</p>
                <a href="<?php echo get_permalink( get_page_by_path('calculadora-de-financiamento') ); ?>" class="btn btn-primary btn-large">Ir para Calculadora</a>
            </div>
            <div class="cta-image">
                <i data-lucide="calculator" style="width: 120px; height: 120px; color: var(--primary); opacity: 0.2;"></i>
            </div>
        </div>
    </div>
</section>

<style>
    .page-header { background: var(--secondary); color: white; text-align: center; }
    .page-header h1 span { color: var(--primary); }

    .financing-intro {
        max-width: 800px;
        margin: 0 auto 5rem;
        text-align: center;
    }

    .financing-intro h2 { font-size: 2.5rem; margin-bottom: 1.5rem; }
    .financing-intro h2 span { color: var(--primary); }
    .financing-intro p { font-size: 1.1rem; color: var(--text-muted); }

    .bank-partners { margin-top: 3rem; }
    .bank-partners p { font-weight: 700; font-size: 0.9rem; text-transform: uppercase; color: var(--secondary); margin-bottom: 1.5rem; }
    .partners-logos {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 3rem;
        flex-wrap: wrap;
    }
    .partners-logos img { height: 40px; filter: grayscale(1); opacity: 0.7; transition: 0.3s; margin: 0.5rem 0; }
    .partners-logos img:hover { filter: grayscale(0); opacity: 1; transform: scale(1.05); }

    .info-blocks-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2rem;
    }

    .info-card {
        padding: 3rem 2rem;
        text-align: center;
    }

    .icon-box-small {
        width: 54px;
        height: 54px;
        background: var(--bg-soft);
        color: var(--primary);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
    }
    
    .icon-box-small i {
        width: 26px;
        height: 26px;
    }

    .calculator-cta {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 4rem;
        overflow: hidden;
        position: relative;
    }

    .cta-content h2 { font-size: 2.5rem; margin-bottom: 1rem; }
    .cta-content h2 span { color: var(--primary); }
    .cta-content p { font-size: 1.25rem; color: var(--text-muted); margin-bottom: 2rem; }

    .btn-large { padding: 1rem 3rem; font-size: 1.1rem; }

    @media (max-width: 1024px) {
        .info-blocks-grid { grid-template-columns: 1fr; }
        .calculator-cta { flex-direction: column; text-align: center; padding: 3rem; }
        .cta-image { display: none; }
    }
</style>

<?php get_footer(); ?>
