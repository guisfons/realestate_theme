<?php
/**
 * Template Name: Calculadora de Financiamento
 */
get_header();
?>

<section class="section-padding">
    <div class="container">
        <div class="calculator-layout">
            <div class="calculator-form glass-panel">
                <h2>Simulador de <span>Financiamento</span></h2>
                <p>Descubra o valor aproximado das parcelas do seu novo imóvel.</p>

                <div class="form-grid">
                    <div class="form-group">
                        <label><i data-lucide="tag"></i> Valor do Imóvel (R$)</label>
                        <div class="input-wrapper">
                            <span class="currency-prefix">R$</span>
                            <input type="number" id="calc-price" value="350000" step="1000" class="input-with-prefix">
                        </div>
                    </div>
                    <div class="form-group">
                        <label><i data-lucide="wallet"></i> Entrada (R$)</label>
                        <div class="input-wrapper">
                            <span class="currency-prefix">R$</span>
                            <input type="number" id="calc-down" value="70000" step="1000" class="input-with-prefix">
                        </div>
                    </div>
                    <div class="form-group">
                        <label><i data-lucide="calendar"></i> Prazo (Anos)</label>
                        <div class="input-wrapper">
                            <input type="number" id="calc-years" value="30">
                            <span class="unit-suffix">Anos</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label><i data-lucide="percent"></i> Taxa de Juros Anual</label>
                        <div class="input-wrapper">
                            <input type="number" id="calc-interest" value="9.5" step="0.1">
                            <span class="unit-suffix">% a.a.</span>
                        </div>
                    </div>
                </div>

                <button class="btn btn-primary w-full" onclick="calculateMortgage()">Calcular Parcelas</button>
            </div>

            <div class="calculator-result" id="calc-result">
                <div class="result-card">
                    <span class="label">Parcela Mensal Estimada</span>
                    <h3 id="result-payment">R$ 0,00</h3>
                </div>
                <div class="result-details">
                    <p>Total Financiado: <strong id="result-total-loan">R$ 0,00</strong></p>
                    <p>Total Pago ao final: <strong id="result-total-paid">R$ 0,00</strong></p>
                </div>
                <div class="result-info">
                    <i data-lucide="info"></i>
                    <p>Este é apenas um simulador aproximado. Como **Correspondente Caixa**, podemos realizar uma simulação oficial para você.</p>
                </div>
                <a href="https://wa.me/5511999999999" class="btn btn-outline w-full">Falar com Especialista</a>
            </div>
        </div>
    </div>
</section>

<style>
    .calculator-layout {
        display: grid;
        grid-template-columns: 1.5fr 1fr;
        gap: 3rem;
        align-items: start;
    }

    .calculator-form {
        padding: 3rem;
    }

    .calculator-form h2 { font-size: 2rem; margin-bottom: 1rem; }
    .calculator-form h2 span { color: var(--primary); }
    .calculator-form p { color: var(--text-muted); margin-bottom: 2rem; }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .w-full { width: 100%; }

    .calculator-result {
        background: var(--secondary);
        color: white;
        padding: 3rem;
        border-radius: 16px;
        position: sticky;
        top: 100px;
    }

    .result-card {
        text-align: center;
        padding: 2rem;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 12px;
        margin-bottom: 2rem;
    }

    .result-card .label { font-size: 0.9rem; color: #CBD5E1; text-transform: uppercase; letter-spacing: 1px; }
    .result-card h3 { font-size: 2.5rem; color: var(--accent); margin-top: 0.5rem; }

    .result-details { margin-bottom: 2rem; border-bottom: 1px solid rgba(255, 255, 255, 0.1); padding-bottom: 1.5rem; }
    .result-details p { display: flex; justify-content: space-between; margin-bottom: 0.5rem; color: #CBD5E1; }
    .result-details strong { color: white; }

    .result-info {
        display: flex;
        gap: 1rem;
        background: rgba(255, 184, 28, 0.1);
        padding: 1rem;
        border-radius: 8px;
        margin-bottom: 2rem;
        font-size: 0.85rem;
        line-height: 1.4;
    }

    .result-info i { width: 24px; color: var(--accent); flex-shrink: 0; }

    .form-group label {
        font-size: 0.85rem;
        font-weight: 700;
        text-transform: uppercase;
        color: var(--secondary);
        margin-bottom: 0.75rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .form-group label i {
        width: 16px;
        color: var(--primary);
    }

    .input-wrapper {
        position: relative;
        display: flex;
        align-items: center;
    }

    .input-wrapper input {
        width: 100%;
        padding: 1rem 1rem;
        padding-left: 3.5rem; /* For currency prefix */
        padding-right: 4.5rem; /* For unit suffix */
        border: 2px solid var(--border);
        border-radius: 12px;
        font-family: inherit;
        font-size: 1.1rem;
        font-weight: 600;
        transition: all 0.3s ease;
        background: white;
    }

    /* Adjust padding for inputs without prefix/suffix */
    #calc-years, #calc-interest { padding-left: 1rem; }
    #calc-price, #calc-down { padding-right: 1rem; }

    .input-wrapper input:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 4px rgba(200, 16, 46, 0.1);
    }

    .currency-prefix {
        position: absolute;
        left: 1.25rem;
        font-weight: 700;
        color: var(--text-muted);
    }

    .unit-suffix {
        position: absolute;
        right: 1rem;
        font-size: 0.8rem;
        font-weight: 700;
        color: var(--text-muted);
        background: var(--bg-soft);
        padding: 0.25rem 0.5rem;
        border-radius: 4px;
    }

    @media (max-width: 768px) {
        .calculator-layout { grid-template-columns: 1fr; }
        .form-grid { grid-template-columns: 1fr; }
    }
</style>

<script>
function calculateMortgage() {
    const price = parseFloat(document.getElementById('calc-price').value);
    const down = parseFloat(document.getElementById('calc-down').value);
    const years = parseFloat(document.getElementById('calc-years').value);
    const interest = parseFloat(document.getElementById('calc-interest').value) / 100 / 12;
    
    const principal = price - down;
    const payments = years * 12;
    
    if (principal <= 0) {
        alert("A entrada não pode ser maior que o valor do imóvel.");
        return;
    }

    const x = Math.pow(1 + interest, payments);
    const monthly = (principal * x * interest) / (x - 1);
    
    const formatter = new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' });
    
    document.getElementById('result-payment').innerText = formatter.format(monthly);
    document.getElementById('result-total-loan').innerText = formatter.format(principal);
    document.getElementById('result-total-paid').innerText = formatter.format(monthly * payments);
}

// Initial calculation
window.onload = calculateMortgage;
</script>

<?php get_footer(); ?>
