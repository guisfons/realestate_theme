<?php
/**
 * Template Name: Fale Conosco
 */
get_header();
?>

<section class="page-header section-padding">
    <div class="container">
        <h1>Fale <span>Conosco</span></h1>
        <p>Estamos prontos para atender você. Entre em contato pelos nossos canais.</p>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <div class="contact-grid">
            <div class="contact-info">
                <h2>Canais de <span>Atendimento</span></h2>
                <p>Escolha a forma mais conveniente para falar com nossa equipe.</p>
                
                <div class="contact-methods">
                    <div class="contact-method-card glass-panel">
                        <i data-lucide="phone"></i>
                        <div>
                            <h4>Telefone</h4>
                            <p>(11) 3941-0000</p>
                        </div>
                    </div>
                    <div class="contact-method-card glass-panel">
                        <i data-lucide="message-circle"></i>
                        <div>
                            <h4>WhatsApp</h4>
                            <p>(11) 99999-9999</p>
                        </div>
                    </div>
                    <div class="contact-method-card glass-panel">
                        <i data-lucide="mail"></i>
                        <div>
                            <h4>E-mail</h4>
                            <p>contato@taipasimoveis.com.br</p>
                        </div>
                    </div>
                    <div class="contact-method-card glass-panel">
                        <i data-lucide="map-pin"></i>
                        <div>
                            <h4>Endereço</h4>
                            <p>Av. Raimundo Pereira de Magalhães, 12345<br>Taipas, São Paulo - SP</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="contact-form-container glass-panel">
                <h3>Envie uma <span>Mensagem</span></h3>
                <form action="#" class="contact-form">
                    <div class="form-group">
                        <label><i data-lucide="user"></i> Nome Completo</label>
                        <div class="input-wrapper">
                            <input type="text" placeholder="Seu nome" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label><i data-lucide="mail"></i> E-mail</label>
                        <div class="input-wrapper">
                            <input type="email" placeholder="seu@email.com" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label><i data-lucide="phone"></i> Telefone</label>
                        <div class="input-wrapper">
                            <input type="tel" placeholder="(11) 99999-9999">
                        </div>
                    </div>
                    <div class="form-group">
                        <label><i data-lucide="message-square"></i> Assunto</label>
                        <div class="input-wrapper">
                            <select>
                                <option>Quero Comprar</option>
                                <option>Quero Alugar</option>
                                <option>Quero Vender meu Imóvel</option>
                                <option>Dúvidas Gerais</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label><i data-lucide="align-left"></i> Mensagem</label>
                        <textarea rows="5" class="modern-textarea" placeholder="Como podemos ajudar?"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-full">Enviar Mensagem</button>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="map-section">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3660.123456789!2d-46.7212345!3d-23.456789!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjPCsDI3JzI0LjQiUyA0NsKwNDMnMTYuNCJX!5e0!3m2!1spt-BR!2sbr!4v1620000000000!5m2!1spt-BR!2sbr" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</section>

<style>
    .page-header { background: var(--secondary); color: white; text-align: center; }
    .page-header h1 span { color: var(--primary); }

    .contact-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 4rem;
        align-items: start;
    }

    .contact-info h2 { font-size: 2.5rem; margin-bottom: 1rem; }
    .contact-info h2 span { color: var(--primary); }
    .contact-info p { margin-bottom: 2rem; color: var(--text-muted); }

    .contact-methods {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1rem;
    }

    .contact-method-card {
        padding: 1.5rem;
        display: flex;
        align-items: center;
        gap: 1.5rem;
    }

    .contact-method-card i {
        width: 32px;
        height: 32px;
        color: var(--primary);
    }

    .contact-method-card h4 { margin-bottom: 0.25rem; font-size: 1.1rem; }
    .contact-method-card p { margin-bottom: 0; color: var(--text-muted); font-size: 0.9rem; }

    .contact-form-container {
        padding: 3rem;
    }

    .contact-form-container h3 { margin-bottom: 2rem; font-size: 1.75rem; text-align: center; }
    .contact-form-container h3 span { color: var(--primary); }

    .modern-textarea {
        width: 100%;
        padding: 1rem;
        border: 2px solid var(--border);
        border-radius: 12px;
        font-family: inherit;
        font-size: 1rem;
        transition: all 0.3s ease;
        resize: vertical;
    }

    .modern-textarea:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 4px rgba(200, 16, 46, 0.1);
    }

    .w-full { width: 100%; }

    @media (max-width: 1024px) {
        .contact-grid { grid-template-columns: 1fr; }
    }
</style>

<?php get_footer(); ?>
