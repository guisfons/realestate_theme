<?php
/**
 * Custom Meta Boxes for Imovel and Proprietario CPTs
 */

function taipas_add_custom_meta_boxes() {
    // Imovel Meta Boxes
    add_meta_box(
        'taipas_imovel_details',
        'Detalhes do Imóvel',
        'taipas_imovel_details_callback',
        'imovel',
        'normal',
        'high'
    );
    add_meta_box(
        'taipas_imovel_location',
        'Localização do Imóvel',
        'taipas_imovel_location_callback',
        'imovel',
        'normal',
        'high'
    );
    add_meta_box(
        'taipas_imovel_values',
        'Valores e Taxas',
        'taipas_imovel_values_callback',
        'imovel',
        'normal',
        'high'
    );
    add_meta_box(
        'taipas_imovel_owner',
        'Proprietário do Imóvel',
        'taipas_imovel_owner_callback',
        'imovel',
        'normal',
        'high'
    );

    // Proprietario Meta Boxes
    add_meta_box(
        'taipas_proprietario_contact',
        'Contato do Proprietário',
        'taipas_proprietario_contact_callback',
        'proprietario',
        'normal',
        'high'
    );
    add_meta_box(
        'taipas_proprietario_properties',
        'Imóveis Relacionados',
        'taipas_proprietario_properties_callback',
        'proprietario',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'taipas_add_custom_meta_boxes');

function taipas_imovel_details_callback($post) {
    $price = get_post_meta($post->ID, '_price', true);
    $area = get_post_meta($post->ID, '_area', true);
    $beds = get_post_meta($post->ID, '_beds', true);
    $baths = get_post_meta($post->ID, '_baths', true);
    $parking = get_post_meta($post->ID, '_parking', true);
    $thumb_url = get_post_meta($post->ID, '_thumbnail_url', true);

    wp_nonce_field('taipas_imovel_meta_box_nonce', 'taipas_imovel_meta_box_nonce_field');
    ?>
    <style>
        .taipas-meta-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            padding: 10px;
        }
        .taipas-meta-field {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }
        .taipas-meta-field label {
            font-weight: 700;
            color: #333;
        }
        .taipas-meta-field input, .taipas-meta-field select {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .taipas-meta-full {
            grid-column: span 2;
        }
    </style>
    <div class="taipas-meta-grid">
        <div class="taipas-meta-field taipas-meta-full">
            <label for="taipas_property_title">Título do Imóvel (se o código for usado no título principal)</label>
            <input type="text" id="taipas_property_title" name="taipas_property_title" value="<?php echo esc_attr(get_post_meta($post->ID, '_property_title', true)); ?>" placeholder="Ex: Casa Moderna no Jaraguá">
        </div>
        <div class="taipas-meta-field">
            <label for="taipas_property_code">Código do Imóvel</label>
            <input type="text" id="taipas_property_code" name="taipas_property_code" value="<?php echo esc_attr(get_post_meta($post->ID, '_property_code', true)); ?>" placeholder="Ex: REF-1234">
        </div>
        <div class="taipas-meta-field">
            <label for="taipas_price">Preço (R$)</label>
            <input type="text" id="taipas_price" name="taipas_price" value="<?php echo esc_attr($price); ?>" placeholder="Ex: R$ 550.000">
        </div>
        <div class="taipas-meta-field">
            <label for="taipas_area">Área (m²)</label>
            <input type="text" id="taipas_area" name="taipas_area" value="<?php echo esc_attr($area); ?>" placeholder="Ex: 150m²">
        </div>
        <div class="taipas-meta-field">
            <label for="taipas_beds">Quartos</label>
            <input type="number" id="taipas_beds" name="taipas_beds" value="<?php echo esc_attr($beds); ?>">
        </div>
        <div class="taipas-meta-field">
            <label for="taipas_baths">Banheiros</label>
            <input type="number" id="taipas_baths" name="taipas_baths" value="<?php echo esc_attr($baths); ?>">
        </div>
        <div class="taipas-meta-field">
            <label for="taipas_parking">Vagas de Garagem</label>
            <input type="number" id="taipas_parking" name="taipas_parking" value="<?php echo esc_attr($parking); ?>">
        </div>
        <div class="taipas-meta-field taipas-meta-full">
            <label for="taipas_features">Diferenciais (Separados por vírgula)</label>
            <?php 
            $features = get_post_meta($post->ID, '_features', true); 
            $features_val = is_array($features) ? implode(', ', $features) : '';
            ?>
            <input type="text" id="taipas_features" name="taipas_features" value="<?php echo esc_attr($features_val); ?>" placeholder="Ex: Cozinha Americana, Quintal, Churrasqueira, Varanda Gourmet">
        </div>
        <div class="taipas-meta-field taipas-meta-full">
            <label>Galeria de Fotos (Outras imagens)</label>
            <div id="taipas-gallery-container">
                <div class="taipas-gallery-previews" style="display: flex; gap: 10px; flex-wrap: wrap; margin-bottom: 10px;">
                    <?php
                    $gallery_ids = get_post_meta($post->ID, '_property_gallery', true);
                    if ($gallery_ids) {
                        $ids = explode(',', $gallery_ids);
                        foreach ($ids as $id) {
                            $img = wp_get_attachment_image_url($id, 'thumbnail');
                            if ($img) {
                                echo '<div class="gallery-item" data-id="' . $id . '" style="position:relative;">';
                                echo '<img src="' . $img . '" style="width:80px; height:80px; object-fit:cover; border-radius:4px; border:1px solid #ddd;">';
                                echo '<span class="remove-gallery-img" style="position:absolute; top:-5px; right:-5px; background:red; color:white; border-radius:50%; width:18px; height:18px; display:flex; align-items:center; justify-content:center; cursor:pointer; font-size:10px;">×</span>';
                                echo '</div>';
                            }
                        }
                    }
                    ?>
                </div>
                <input type="hidden" id="taipas_gallery_ids" name="taipas_gallery_ids" value="<?php echo esc_attr($gallery_ids); ?>">
                <button type="button" class="button" id="taipas_select_gallery">Selecionar Imagens da Galeria</button>
            </div>
            <p class="description">A imagem principal deve ser definida no campo "Imagem de Destaque" na barra lateral.</p>
        </div>
    </div>
    <script>
    jQuery(document).ready(function($) {
        var frame;
        $('#taipas_select_gallery').on('click', function(e) {
            e.preventDefault();
            if (frame) { frame.open(); return; }
            frame = wp.media({
                title: 'Selecionar Imagens para a Galeria',
                button: { text: 'Adicionar à Galeria' },
                multiple: true
            });
            frame.on('select', function() {
                var selections = frame.state().get('selection');
                var ids = $('#taipas_gallery_ids').val() ? $('#taipas_gallery_ids').val().split(',') : [];
                selections.map(function(attachment) {
                    attachment = attachment.toJSON();
                    if (ids.indexOf(attachment.id.toString()) === -1) {
                        ids.push(attachment.id);
                        $('.taipas-gallery-previews').append(
                            '<div class="gallery-item" data-id="' + attachment.id + '" style="position:relative;">' +
                            '<img src="' + attachment.sizes.thumbnail.url + '" style="width:80px; height:80px; object-fit:cover; border-radius:4px; border:1px solid #ddd;">' +
                            '<span class="remove-gallery-img" style="position:absolute; top:-5px; right:-5px; background:red; color:white; border-radius:50%; width:18px; height:18px; display:flex; align-items:center; justify-content:center; cursor:pointer; font-size:10px;">×</span>' +
                            '</div>'
                        );
                    }
                });
                $('#taipas_gallery_ids').val(ids.join(','));
            });
            frame.open();
        });

        $(document).on('click', '.remove-gallery-img', function() {
            var id = $(this).parent().data('id').toString();
            var ids = $('#taipas_gallery_ids').val().split(',');
            ids = ids.filter(function(v) { return v !== id; });
            $('#taipas_gallery_ids').val(ids.join(','));
            $(this).parent().remove();
        });
    });
    </script>
    <?php
}

function taipas_imovel_location_callback($post) {
    $cep = get_post_meta($post->ID, '_cep', true);
    $address = get_post_meta($post->ID, '_address', true);
    ?>
    <div class="taipas-meta-grid">
        <div class="taipas-meta-field">
            <label for="taipas_cep">CEP</label>
            <input type="text" id="taipas_cep" name="taipas_cep" value="<?php echo esc_attr($cep); ?>" placeholder="Ex: 02998-000">
        </div>
        <div class="taipas-meta-field">
            <label for="taipas_address">Endereço Completo</label>
            <input type="text" id="taipas_address" name="taipas_address" value="<?php echo esc_attr($address); ?>" placeholder="Ex: Av. Raimundo Pereira de Magalhães, 1234 - Bloco A">
        </div>
    </div>
    <?php
}

function taipas_imovel_values_callback($post) {
    $condo_fee = get_post_meta($post->ID, '_condo_fee', true);
    $iptu_fee = get_post_meta($post->ID, '_iptu_fee', true);
    ?>
    <div class="taipas-meta-grid">
        <div class="taipas-meta-field">
            <label for="taipas_condo_fee">Valor do Condomínio (R$)</label>
            <input type="text" id="taipas_condo_fee" name="taipas_condo_fee" value="<?php echo esc_attr($condo_fee); ?>" placeholder="Ex: R$ 450">
        </div>
        <div class="taipas-meta-field">
            <label for="taipas_iptu_fee">Valor do IPTU (R$)</label>
            <input type="text" id="taipas_iptu_fee" name="taipas_iptu_fee" value="<?php echo esc_attr($iptu_fee); ?>" placeholder="Ex: R$ 120">
        </div>
    </div>
    <?php
}

function taipas_imovel_owner_callback($post) {
    $selected_owner_id = get_post_meta($post->ID, '_proprietario_id', true);
    
    // Fetch all owners
    $owners = get_posts([
        'post_type' => 'proprietario',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC'
    ]);
    ?>
    <div class="taipas-owner-section" style="padding: 10px;">
        <div style="margin-bottom: 15px;">
            <label for="taipas_proprietario_id" style="font-weight: 700; display: block; margin-bottom: 5px;">Selecionar Proprietário</label>
            <select id="taipas_proprietario_id" name="taipas_proprietario_id" style="width: 100%; max-width: 400px; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                <option value="">-- Sem Proprietário / Nenhum --</option>
                <option value="new" <?php selected($selected_owner_id, 'new'); ?>>+ Cadastrar Novo Proprietário</option>
                <?php foreach ($owners as $owner) : ?>
                    <option value="<?php echo esc_attr($owner->ID); ?>" <?php selected($selected_owner_id, $owner->ID); ?>>
                        <?php echo esc_html($owner->post_title); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Section for creating new owner, hidden by default unless 'new' is selected -->
        <div id="taipas_new_owner_fields" style="display: none; border-left: 3px solid #0073aa; padding-left: 15px; margin-top: 15px;">
            <h4 style="margin-top: 0; margin-bottom: 10px; color: #0073aa;">Cadastrar Novo Proprietário</h4>
            <div class="taipas-meta-grid" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; padding: 0;">
                <div class="taipas-meta-field">
                    <label for="taipas_new_owner_name" style="font-weight: 700;">Nome do Proprietário</label>
                    <input type="text" id="taipas_new_owner_name" name="taipas_new_owner_name" placeholder="Ex: João Silva">
                </div>
                <div class="taipas-meta-field">
                    <label for="taipas_new_owner_phone" style="font-weight: 700;">Telefone</label>
                    <input type="text" id="taipas_new_owner_phone" name="taipas_new_owner_phone" placeholder="Ex: (11) 99999-9999">
                </div>
            </div>
        </div>
    </div>
    
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        function toggleNewOwnerFields() {
            if ($('#taipas_proprietario_id').val() === 'new') {
                $('#taipas_new_owner_fields').slideDown(200);
            } else {
                $('#taipas_new_owner_fields').slideUp(200);
            }
        }
        
        $('#taipas_proprietario_id').on('change', toggleNewOwnerFields);
        toggleNewOwnerFields(); // Run on load
    });
    </script>
    <?php
}

function taipas_proprietario_contact_callback($post) {
    $phone = get_post_meta($post->ID, '_owner_phone', true);
    wp_nonce_field('taipas_proprietario_meta_box_nonce', 'taipas_proprietario_meta_box_nonce_field');
    ?>
    <div style="padding: 10px;">
        <div style="display: flex; flex-direction: column; gap: 5px;">
            <label for="taipas_owner_phone" style="font-weight: 700; color: #333;">Telefone do Proprietário</label>
            <input type="text" id="taipas_owner_phone" name="taipas_owner_phone" value="<?php echo esc_attr($phone); ?>" placeholder="Ex: (11) 99999-9999" style="padding: 8px; border: 1px solid #ddd; border-radius: 4px; max-width: 300px;">
        </div>
    </div>
    <?php
}

function taipas_proprietario_properties_callback($post) {
    $properties = get_posts([
        'post_type' => 'imovel',
        'posts_per_page' => -1,
        'meta_query' => [
            [
                'key' => '_proprietario_id',
                'value' => $post->ID,
                'compare' => '='
            ]
        ]
    ]);
    
    if (!empty($properties)) {
        echo '<table class="wp-list-table widefat fixed striped posts" style="margin-top: 10px;">';
        echo '<thead><tr><th><b>Título do Imóvel</b></th><th><b>Tipo de Negócio</b></th><th><b>Ações</b></th></tr></thead>';
        echo '<tbody>';
        foreach ($properties as $prop) {
            $business_terms = get_the_terms($prop->ID, 'tipo_negocio');
            $business = $business_terms ? esc_html($business_terms[0]->name) : '—';
            $edit_link = get_edit_post_link($prop->ID);
            $view_link = get_permalink($prop->ID);
            
            echo '<tr>';
            echo '<td><strong><a href="' . esc_url($edit_link) . '">' . esc_html($prop->post_title) . '</a></strong></td>';
            echo '<td>' . $business . '</td>';
            echo '<td>';
            echo '<a href="' . esc_url($edit_link) . '" class="button button-small">Editar</a> ';
            echo '<a href="' . esc_url($view_link) . '" class="button button-small" target="_blank">Visualizar no Site</a>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        echo '<p style="padding: 10px; color: #666;">Nenhum imóvel relacionado a este proprietário.</p>';
    }
}

function taipas_save_imovel_meta_data($post_id) {
    // Check if the current post type is strictly 'imovel' to avoid recursive save triggers on other post types
    if (get_post_type($post_id) !== 'imovel') {
        return;
    }

    if (!isset($_POST['taipas_imovel_meta_box_nonce_field']) || !wp_verify_nonce($_POST['taipas_imovel_meta_box_nonce_field'], 'taipas_imovel_meta_box_nonce')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Validate Property Code uniqueness
    if (isset($_POST['taipas_property_code'])) {
        $new_code = sanitize_text_field($_POST['taipas_property_code']);
        if (!empty($new_code)) {
            $existing = get_posts([
                'post_type' => 'imovel',
                'post_status' => 'any',
                'meta_key' => '_property_code',
                'meta_value' => $new_code,
                'post__not_in' => [$post_id],
                'posts_per_page' => 1,
                'fields' => 'ids'
            ]);
            
            if (!empty($existing)) {
                set_transient('taipas_duplicate_code_' . get_current_user_id(), true, 45);
            } else {
                update_post_meta($post_id, '_property_code', $new_code);
            }
        } else {
            update_post_meta($post_id, '_property_code', '');
        }
    }

    $fields = [
        'taipas_property_title' => '_property_title',
        'taipas_price' => '_price',
        'taipas_area' => '_area',
        'taipas_beds' => '_beds',
        'taipas_baths' => '_baths',
        'taipas_parking' => '_parking',
        'taipas_gallery_ids' => '_property_gallery',
        'taipas_cep' => '_cep',
        'taipas_address' => '_address',
        'taipas_condo_fee' => '_condo_fee',
        'taipas_iptu_fee' => '_iptu_fee'
    ];

    foreach ($fields as $post_key => $meta_key) {
        if (isset($_POST[$post_key])) {
            update_post_meta($post_id, $meta_key, sanitize_text_field($_POST[$post_key]));
        }
    }

    // Save Features
    if (isset($_POST['taipas_features'])) {
        $features_raw = sanitize_text_field($_POST['taipas_features']);
        $features_array = array_filter(array_map('trim', explode(',', $features_raw)));
        update_post_meta($post_id, '_features', $features_array);
    }

    // Handle Proprietário selection
    if (isset($_POST['taipas_proprietario_id'])) {
        $owner_val = $_POST['taipas_proprietario_id'];
        if ($owner_val === 'new') {
            // Register new owner
            if (isset($_POST['taipas_new_owner_name']) && !empty(trim($_POST['taipas_new_owner_name']))) {
                $new_owner_name = sanitize_text_field($_POST['taipas_new_owner_name']);
                $new_owner_phone = isset($_POST['taipas_new_owner_phone']) ? sanitize_text_field($_POST['taipas_new_owner_phone']) : '';
                
                // Temporarily remove save_post actions to prevent infinite recursion loop
                remove_action('save_post', 'taipas_save_imovel_meta_data');
                remove_action('save_post', 'taipas_save_proprietario_meta_data');
                
                // Create the new owner post
                $new_owner_id = wp_insert_post([
                    'post_title' => $new_owner_name,
                    'post_type' => 'proprietario',
                    'post_status' => 'publish'
                ]);
                
                if ($new_owner_id && !is_wp_error($new_owner_id)) {
                    update_post_meta($new_owner_id, '_owner_phone', $new_owner_phone);
                    // Update property to link to the new owner
                    update_post_meta($post_id, '_proprietario_id', $new_owner_id);
                }
                
                // Re-hook the save_post actions
                add_action('save_post', 'taipas_save_imovel_meta_data');
                add_action('save_post', 'taipas_save_proprietario_meta_data');
            }
        } elseif (!empty($owner_val)) {
            // Link to existing owner
            update_post_meta($post_id, '_proprietario_id', intval($owner_val));
        } else {
            // Unlink owner (delete meta or set empty)
            delete_post_meta($post_id, '_proprietario_id');
        }
    }
}
add_action('save_post', 'taipas_save_imovel_meta_data');

function taipas_save_proprietario_meta_data($post_id) {
    // Check if the current post type is strictly 'proprietario'
    if (get_post_type($post_id) !== 'proprietario') {
        return;
    }

    if (!isset($_POST['taipas_proprietario_meta_box_nonce_field']) || !wp_verify_nonce($_POST['taipas_proprietario_meta_box_nonce_field'], 'taipas_proprietario_meta_box_nonce')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['taipas_owner_phone'])) {
        update_post_meta($post_id, '_owner_phone', sanitize_text_field($_POST['taipas_owner_phone']));
    }
}
add_action('save_post', 'taipas_save_proprietario_meta_data');

/**
 * Add input mask to phone fields in admin edit screens
 */
function taipas_admin_phone_mask_script() {
    global $post_type;
    if (in_array($post_type, ['imovel', 'proprietario'])) {
        ?>
        <script type="text/javascript">
        jQuery(document).ready(function($) {
            function maskPhone(val) {
                if (!val) return '';
                val = val.replace(/\D/g, '');
                if (val.length > 11) {
                    val = val.substring(0, 11);
                }
                if (val.length > 10) {
                    return '(' + val.substring(0, 2) + ') ' + val.substring(2, 7) + '-' + val.substring(7, 11);
                } else if (val.length > 6) {
                    return '(' + val.substring(0, 2) + ') ' + val.substring(2, 6) + '-' + val.substring(6, 10);
                } else if (val.length > 2) {
                    return '(' + val.substring(0, 2) + ') ' + val.substring(2);
                } else if (val.length > 0) {
                    return '(' + val;
                }
                return val;
            }

            $(document).on('input', '#taipas_new_owner_phone, #taipas_owner_phone', function() {
                var cursorPosition = this.selectionStart;
                var originalLength = this.value.length;
                var masked = maskPhone(this.value);
                this.value = masked;
                
                var newLength = masked.length;
                var diff = newLength - originalLength;
                if (diff !== 0) {
                    this.setSelectionRange(cursorPosition + diff, cursorPosition + diff);
                }
            });

            // Format on load
            $('#taipas_new_owner_phone, #taipas_owner_phone').each(function() {
                if (this.value) {
                    this.value = maskPhone(this.value);
                }
            });
        });
        </script>
        <?php
    }
}
add_action('admin_footer', 'taipas_admin_phone_mask_script');

