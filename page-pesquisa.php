<?php
/**
 * Template Name: Pesquisa Completa
 */
get_header();
?>

<section class="page-header section-padding">
    <div class="container">
        <h1>Pesquisa <span>Completa</span></h1>
        <p>Encontre exatamente o que você procura com nossos filtros avançados.</p>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <div class="advanced-search-container glass-panel">
            <form action="<?php echo get_post_type_archive_link('imovel'); ?>" method="get" class="advanced-search-form">
                <div class="search-section">
                    <h3><i data-lucide="info"></i> Informações Básicas</h3>
                    <div class="search-grid">
                        <div class="form-group">
                            <label>Finalidade</label>
                            <div class="radio-group-modern">
                                <input type="radio" name="negocio" id="adv-venda" value="venda" checked>
                                <label for="adv-venda">Venda</label>
                                <input type="radio" name="negocio" id="adv-locacao" value="locacao">
                                <label for="adv-locacao">Locação</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tipo de Imóvel</label>
                            <div class="input-wrapper">
                                <select name="tipo">
                                    <option value="">Todos os tipos</option>
                                    <option value="casa">Casa</option>
                                    <option value="apartamento">Apartamento</option>
                                    <option value="terreno">Terreno</option>
                                    <option value="comercial">Comercial</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Localização</label>
                            <div class="input-wrapper">
                                <i data-lucide="map-pin" class="input-icon"></i>
                                <input type="text" name="localizacao" placeholder="Bairro, Cidade ou Condomínio" class="input-with-icon">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="search-section">
                    <h3><i data-lucide="layout"></i> Características</h3>
                    <div class="search-grid">
                        <div class="form-group">
                            <label>Dormitórios</label>
                            <div class="number-selector">
                                <input type="radio" name="quartos" id="q-any" value="" checked><label for="q-any">Qualquer</label>
                                <input type="radio" name="quartos" id="q-1" value="1"><label for="q-1">1+</label>
                                <input type="radio" name="quartos" id="q-2" value="2"><label for="q-2">2+</label>
                                <input type="radio" name="quartos" id="q-3" value="3"><label for="q-3">3+</label>
                                <input type="radio" name="quartos" id="q-4" value="4"><label for="q-4">4+</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Vagas de Garagem</label>
                            <div class="number-selector">
                                <input type="radio" name="vagas" id="v-any" value="" checked><label for="v-any">Qualquer</label>
                                <input type="radio" name="vagas" id="v-1" value="1"><label for="v-1">1+</label>
                                <input type="radio" name="vagas" id="v-2" value="2"><label for="v-2">2+</label>
                                <input type="radio" name="vagas" id="v-3" value="3"><label for="v-3">3+</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Suítes</label>
                            <div class="number-selector">
                                <input type="radio" name="suites" id="s-any" value="" checked><label for="s-any">Qualquer</label>
                                <input type="radio" name="suites" id="s-1" value="1"><label for="s-1">1+</label>
                                <input type="radio" name="suites" id="s-2" value="2"><label for="s-2">2+</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="search-section">
                    <h3><i data-lucide="dollar-sign"></i> Valores e Área</h3>
                    <div class="search-grid">
                        <div class="form-group">
                            <label>Faixa de Preço</label>
                            <div class="price-range-wrapper">
                                <input type="range" min="0" max="5000000" step="50000" id="adv-price-slider">
                                <div class="range-values">
                                    <span>R$ 0</span>
                                    <span id="adv-price-display" style="color: var(--primary); font-weight: 700;">Até R$ 1.5M</span>
                                    <span>R$ 5M+</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Área Mínima (m²)</label>
                            <div class="input-wrapper">
                                <input type="number" name="area_min" placeholder="Ex: 50">
                                <span class="unit-suffix">m²</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Código do Imóvel</label>
                            <div class="input-wrapper">
                                <input type="text" name="sku" placeholder="Ex: TP123">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="reset" class="btn btn-outline">Limpar Filtros</button>
                    <button type="submit" class="btn btn-primary btn-large">
                        <i data-lucide="search"></i> Buscar Imóveis
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<style>
    .page-header { background: var(--secondary); color: white; text-align: center; }
    .page-header h1 span { color: var(--primary); }

    .advanced-search-container {
        padding: 4rem;
    }

    .search-section {
        margin-bottom: 3rem;
        padding-bottom: 2rem;
        border-bottom: 1px solid var(--border);
    }

    .search-section:last-of-type { border-bottom: none; }

    .search-section h3 {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 2rem;
        color: var(--secondary);
        font-size: 1.25rem;
    }

    .search-section h3 i { color: var(--primary); width: 20px; }

    .search-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2rem;
    }

    .input-icon {
        position: absolute;
        left: 1rem;
        color: var(--text-muted);
        width: 18px;
    }

    .input-with-icon { padding-left: 3rem !important; }

    .number-selector {
        display: flex;
        gap: 0.5rem;
    }

    .number-selector input { display: none; }
    .number-selector label {
        flex: 1;
        background: var(--bg-soft);
        padding: 0.75rem 0.5rem;
        text-align: center;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 600;
        font-size: 0.85rem;
        transition: 0.3s;
        border: 2px solid transparent;
        text-transform: none;
    }

    .number-selector input:checked + label {
        background: white;
        border-color: var(--primary);
        color: var(--primary);
        box-shadow: var(--shadow-sm);
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 1.5rem;
        margin-top: 2rem;
    }

    .btn-large { padding: 1rem 3rem; font-size: 1.1rem; gap: 0.75rem; }

    @media (max-width: 1024px) {
        .search-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 640px) {
        .search-grid { grid-template-columns: 1fr; }
        .advanced-search-container { padding: 2rem; }
        .form-actions { flex-direction: column-reverse; }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const advSlider = document.getElementById('adv-price-slider');
    const advDisplay = document.getElementById('adv-price-display');
    
    if (advSlider && advDisplay) {
        advSlider.addEventListener('input', (e) => {
            const value = parseInt(e.target.value);
            if (value === 0) {
                advDisplay.textContent = 'Qualquer valor';
            } else if (value >= 1000000) {
                advDisplay.textContent = `Até R$ ${(value / 1000000).toFixed(1)}M`;
            } else {
                advDisplay.textContent = `Até R$ ${value / 1000}k`;
            }
        });
    }
});
</script>

<?php get_footer(); ?>
