<?php
/**
 * Template Name: Correspondente Bancário
 */
get_header();
?>

<section class="page-header section-padding">
    <div class="container">
        <h1>Correspondente <span>Caixa</span></h1>
        <p>Aprovamos seu crédito com agilidade e segurança sem que você precise ir ao banco.</p>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <div class="caixa-grid">
            <div class="caixa-text">
                <h2>Tudo o que você precisa <span>em um só lugar</span>.</h2>
                <p>Como correspondente bancário autorizado pela Caixa Econômica Federal, a Taipas Imóveis oferece toda a comodidade para você realizar o seu financiamento imobiliário.</p>
                
                <ul class="caixa-benefits">
                    <li><i data-lucide="check-circle"></i> Abertura de contas</li>
                    <li><i data-lucide="check-circle"></i> Simulação de financiamento</li>
                    <li><i data-lucide="check-circle"></i> Aprovação de crédito rápida</li>
                    <li><i data-lucide="check-circle"></i> Uso do FGTS</li>
                    <li><i data-lucide="check-circle"></i> Consórcios imobiliários</li>
                </ul>

                <div class="cta-box glass-panel">
                    <h3>Quer saber quanto pode financiar?</h3>
                    <p>Nossa equipe faz a simulação completa para você agora mesmo.</p>
                    <a href="<?php echo get_permalink( get_page_by_path('calculadora-de-financiamento') ); ?>" class="btn btn-primary">Simular Agora</a>
                </div>
            </div>
            <div class="caixa-visual">
                <div class="caixa-logo-card glass-panel">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d7/Logo_Caixa_Econ%C3%B4mica_Federal.svg/2560px-Logo_Caixa_Econ%C3%B4mica_Federal.svg.png" alt="Caixa Logo" style="width: 200px; margin-bottom: 2rem;">
                    <h3>Parceiro Estratégico</h3>
                    <p>Garantimos as melhores taxas do mercado com o suporte da maior instituição financeira de habitação do Brasil.</p>
                    
                    <div class="other-banks">
                        <p>Também operamos com:</p>
                        <div class="other-banks-icons">
                            <img src="https://upload.wikimedia.org/wikipedia/pt/thumb/f/f2/Logo_Ita%C3%BA.svg/1200px-Logo_Ita%C3%BA.svg.png" alt="Itaú">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/Banco_Bradesco_logo.svg/2560px-Banco_Bradesco_logo.svg.png" alt="Bradesco">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b3/Santander_Logo.svg/2560px-Santander_Logo.svg.png" alt="Santander">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-padding bg-soft">
    <div class="container">
        <div class="section-header">
            <h2>Como <span>Funciona?</span></h2>
            <p>Passo a passo simplificado para o seu financiamento.</p>
        </div>
        
        <div class="steps-grid">
            <div class="step-card">
                <span class="step-num">01</span>
                <h4>Simulação</h4>
                <p>Analisamos seu perfil e mostramos as melhores opções de parcelas e prazos.</p>
            </div>
            <div class="step-card">
                <span class="step-num">02</span>
                <h4>Documentação</h4>
                <p>Você nos envia os documentos necessários e nós cuidamos de toda a burocracia.</p>
            </div>
            <div class="step-card">
                <span class="step-num">03</span>
                <h4>Aprovação</h4>
                <p>Em poucos dias você recebe a resposta da aprovação do seu crédito.</p>
            </div>
            <div class="step-card">
                <span class="step-num">04</span>
                <h4>Assinatura</h4>
                <p>Com tudo aprovado, você assina o contrato e realiza o sonho da casa nova.</p>
            </div>
        </div>
    </div>
</section>

<style>
    .page-header { background: #005CA9; color: white; text-align: center; } /* Caixa Blue */
    .page-header h1 span { color: #F39200; } /* Caixa Orange */

    .caixa-grid {
        display: grid;
        grid-template-columns: 1.2fr 0.8fr;
        gap: 4rem;
        align-items: center;
    }

    .caixa-text h2 { font-size: 2.5rem; margin-bottom: 1.5rem; }
    .caixa-text h2 span { color: var(--primary); }
    .caixa-text p { font-size: 1.1rem; color: var(--text-muted); margin-bottom: 2rem; }

    .caixa-benefits { margin-bottom: 3rem; }
    .caixa-benefits li {
        display: flex;
        align-items: flex-start;
        gap: 1rem;
        margin-bottom: 1.25rem;
        font-weight: 600;
        color: var(--secondary);
    }
    .caixa-benefits li i { color: #00A335; width: 22px; height: 22px; flex-shrink: 0; margin-top: 2px; }

    .cta-box { padding: 2.5rem; text-align: center; }
    .cta-box h3 { margin-bottom: 0.5rem; }
    .cta-box p { margin-bottom: 1.5rem; }

    .caixa-logo-card {
        padding: 4rem 2rem;
        text-align: center;
        border-bottom: 8px solid #F39200;
    }

    .other-banks {
        margin-top: 3rem;
        padding-top: 2rem;
        border-top: 1px solid var(--border);
    }

    .other-banks p {
        font-size: 0.8rem;
        font-weight: 700;
        text-transform: uppercase;
        color: var(--text-muted);
        margin-bottom: 1.5rem !important;
    }

    .other-banks-icons {
        display: flex;
        justify-content: center;
        gap: 2rem;
        align-items: center;
    }

    .other-banks-icons img {
        height: 25px;
        filter: grayscale(1);
        opacity: 0.6;
    }

    .section-header { text-align: center; margin-bottom: 4rem; }
    .section-header h2 span { color: var(--primary); }

    .steps-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 2rem;
    }

    .step-card {
        text-align: center;
        position: relative;
    }

    .step-num {
        font-size: 4rem;
        font-weight: 900;
        color: var(--border);
        line-height: 1;
        display: block;
        margin-bottom: 1rem;
        transition: 0.3s;
    }

    .step-card:hover .step-num { color: var(--primary); opacity: 0.2; }

    .step-card h4 { margin-bottom: 0.75rem; font-size: 1.25rem; }
    .step-card p { color: var(--text-muted); font-size: 0.95rem; }

    @media (max-width: 1024px) {
        .caixa-grid { grid-template-columns: 1fr; }
        .steps-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 640px) {
        .steps-grid { grid-template-columns: 1fr; }
    }
</style>

<?php get_footer(); ?>
