<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Ficha do Imóvel - REF: <?php echo esc_html($post_id); ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Inter', sans-serif;
            color: #111827;
            background-color: #ffffff;
            line-height: 1.4;
            padding: 15px;
            font-size: 10pt;
        }
        .no-print-header {
            background-color: #f3f4f6;
            border: 1px solid #e5e7eb;
            padding: 10px 15px;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        .btn-print {
            background-color: #c8102e;
            color: #ffffff;
            border: none;
            padding: 6px 12px;
            font-weight: 600;
            border-radius: 6px;
            cursor: pointer;
            font-family: 'Outfit', sans-serif;
            font-size: 13px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
        }
        .btn-print:hover {
            background-color: #b00e27;
        }
        .print-container {
            max-width: 800px;
            margin: 0 auto;
            border: 2px solid #1f2937;
            padding: 16px;
            border-radius: 4px;
            background: #fff;
        }
        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            border-bottom: 2px dashed #1f2937;
            padding-bottom: 10px;
            margin-bottom: 12px;
        }
        .header-title h1 {
            font-family: 'Outfit', sans-serif;
            font-size: 16pt;
            font-weight: 800;
            color: #111827;
            margin-bottom: 2px;
        }
        .header-title p {
            font-size: 9.5pt;
            color: #4b5563;
            font-weight: 500;
        }
        .header-meta {
            text-align: right;
        }
        .header-meta .code {
            font-family: 'Outfit', sans-serif;
            font-size: 12pt;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 2px;
        }
        .header-meta .price {
            font-size: 13pt;
            font-weight: 700;
            color: #c8102e;
        }
        
        /* Reorganized Layout: Side by Side */
        .columns-wrapper {
            display: grid;
            grid-template-columns: 260px 1fr;
            gap: 12px;
            margin-bottom: 12px;
        }
        .left-column {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }
        .right-column {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        
        .property-image-box {
            width: 100%;
            height: 245px;
            border: 1px solid #1f2937;
            border-radius: 2px;
            overflow: hidden;
            page-break-inside: avoid;
        }
        .property-image-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .section-box {
            border: 1px solid #1f2937;
            margin-bottom: 12px;
            border-radius: 2px;
            page-break-inside: avoid;
        }
        .section-title {
            background-color: #1f2937;
            color: #ffffff;
            font-family: 'Outfit', sans-serif;
            font-size: 9.5pt;
            font-weight: 700;
            padding: 4px 10px;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .section-title span {
            font-size: 10pt;
        }
        .grid-1 {
            display: grid;
            grid-template-columns: 1fr;
        }
        .grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
        }
        .grid-3 {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
        }
        .field-item {
            border-bottom: 1px solid #e5e7eb;
            border-right: 1px solid #e5e7eb;
            padding: 6px 10px;
        }
        .field-item:last-child, .field-item.no-border-right {
            border-right: none;
        }
        .field-item.no-border-bottom {
            border-bottom: none;
        }
        .field-label {
            font-size: 8pt;
            color: #4b5563;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 1px;
        }
        .field-value {
            font-size: 9.5pt;
            font-weight: 700;
            color: #111827;
        }
        .description-content {
            padding: 10px;
            font-size: 9pt;
            line-height: 1.4;
        }
        .description-content p {
            margin-bottom: 6px;
        }
        .description-content p:last-child {
            margin-bottom: 0;
        }
        
        @media print {
            body {
                padding: 0;
                background-color: #fff;
            }
            .no-print-header {
                display: none !important;
            }
            .print-container {
                border: none;
                padding: 0;
                max-width: 100%;
            }
            .property-image-box {
                border-color: #000;
            }
        }
    </style>
</head>
<body>

    <div class="no-print-header">
        <div>
            <span style="font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 15px;">Ficha da Propriedade (Modo Admin)</span>
            <p style="font-size: 11px; color: #4b5563; margin-top: 1px;">Use este painel para imprimir ou gerar um PDF da ficha.</p>
        </div>
        <button onclick="window.print();" class="btn-print">
            <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0a2.25 2.25 0 01-2.25 2.25H8.59A2.25 2.25 0 016.34 18m11.318-4.171A2.25 2.25 0 0016.5 10.5H7.5A2.25 2.25 0 005.182 13.83M16.5 10.5V6.75A2.25 2.25 0 0014.25 4.5h-4.5A2.25 2.25 0 007.5 6.75V10.5m1.5-3h6.75"></path>
            </svg>
            Imprimir Ficha
        </button>
    </div>

    <div class="print-container">
        <div class="header-section">
            <div class="header-title">
                <h1><?php echo esc_html($post->post_title); ?></h1>
                <p><?php echo esc_html($address); ?></p>
            </div>
            <div class="header-meta">
                <div class="code">REF: <?php echo esc_html($post_id); ?></div>
                <div class="price"><?php echo esc_html($tipo_negocio); ?>: <?php echo esc_html($price); ?></div>
            </div>
        </div>

        <?php
        $thumb_id = get_post_thumbnail_id($post_id);
        $mock_thumb = get_post_meta($post_id, '_thumbnail_url', true);
        $image_url = '';
        if ($thumb_id) {
            $image_url = wp_get_attachment_image_url($thumb_id, 'large');
        } elseif ($mock_thumb) {
            $image_url = $mock_thumb;
        } else {
            $gallery_ids_str = get_post_meta($post_id, '_property_gallery', true);
            if ($gallery_ids_str) {
                $gallery_items = explode(',', $gallery_ids_str);
                if (!empty($gallery_items)) {
                    $first_gallery = $gallery_items[0];
                    if (is_numeric($first_gallery)) {
                        $image_url = wp_get_attachment_image_url($first_gallery, 'large');
                    } else {
                        $image_url = $first_gallery;
                    }
                }
            }
        }
        if (empty($image_url)) {
            $image_url = 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&q=80&w=1200';
        }
        ?>

        <div class="columns-wrapper">
            <!-- Left Side: Image -->
            <div class="left-column">
                <div class="property-image-box">
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($post->post_title); ?>">
                </div>
            </div>

            <!-- Right Side: Owner and Primary Specs -->
            <div class="right-column">
                <!-- Proprietário Section -->
                <div class="section-box" style="margin-bottom: 0;">
                    <div class="section-title">
                        <span>[☒]</span> Proprietário
                    </div>
                    <div class="grid-1">
                        <div class="field-item">
                            <div class="field-label">Nome do Proprietário</div>
                            <div class="field-value"><?php echo esc_html($owner_name); ?></div>
                        </div>
                        <div class="field-item no-border-bottom">
                            <div class="field-label">Telefone de Contato</div>
                            <div class="field-value"><?php echo esc_html($owner_phone); ?></div>
                        </div>
                    </div>
                </div>

                <!-- Dados Primários Section -->
                <div class="section-box" style="margin-bottom: 0; margin-top: 8px;">
                    <div class="section-title">
                        <span>[☒]</span> Dados Primários
                    </div>
                    <div class="grid-2">
                        <div class="field-item">
                            <div class="field-label">Tipo</div>
                            <div class="field-value"><?php echo esc_html($tipo_imovel); ?></div>
                        </div>
                        <div class="field-item no-border-right">
                            <div class="field-label">Transação</div>
                            <div class="field-value"><?php echo esc_html($tipo_negocio); ?></div>
                        </div>
                        <div class="field-item">
                            <div class="field-label">Dormitórios</div>
                            <div class="field-value"><?php echo esc_html($beds); ?></div>
                        </div>
                        <div class="field-item no-border-right">
                            <div class="field-label">Vagas</div>
                            <div class="field-value"><?php echo esc_html($parking); ?></div>
                        </div>
                        <div class="field-item no-border-bottom">
                            <div class="field-label">Banheiros</div>
                            <div class="field-value"><?php echo esc_html($baths); ?></div>
                        </div>
                        <div class="field-item no-border-bottom no-border-right">
                            <div class="field-label">Área Útil</div>
                            <div class="field-value"><?php echo esc_html($area); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Localização Section -->
        <div class="section-box">
            <div class="section-title">
                <span>[☒]</span> Localização
            </div>
            <div class="grid-2">
                <div class="field-item no-border-bottom">
                    <div class="field-label">Endereço</div>
                    <div class="field-value"><?php echo esc_html($address); ?></div>
                </div>
                <div class="field-item no-border-bottom no-border-right">
                    <div class="field-label">CEP</div>
                    <div class="field-value"><?php echo esc_html($cep); ?></div>
                </div>
            </div>
        </div>

        <!-- Valores e Taxas Section -->
        <div class="section-box">
            <div class="section-title">
                <span>[☒]</span> Valores e Taxas
            </div>
            <div class="grid-3">
                <div class="field-item no-border-bottom">
                    <div class="field-label">Valor do Imóvel</div>
                    <div class="field-value"><?php echo esc_html($price); ?></div>
                </div>
                <div class="field-item no-border-bottom">
                    <div class="field-label">Condomínio</div>
                    <div class="field-value"><?php echo esc_html($condo); ?></div>
                </div>
                <div class="field-item no-border-bottom no-border-right">
                    <div class="field-label">IPTU</div>
                    <div class="field-value"><?php echo esc_html($iptu); ?></div>
                </div>
            </div>
        </div>

        <!-- Descrição Section -->
        <div class="section-box" style="margin-bottom: 0;">
            <div class="section-title">
                <span>[☒]</span> Descrição
            </div>
            <div class="description-content">
                <?php echo wp_kses_post(wpautop($post->post_content)); ?>
            </div>
        </div>
    </div>

    <script>
        window.onload = function() {
            setTimeout(function() {
                window.print();
            }, 500);
        };
    </script>
</body>
</html>
