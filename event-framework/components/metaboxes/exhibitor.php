<?php
add_action('add_meta_boxes', 'ef_exhibitor_metabox');

function ef_exhibitor_metabox() {
    add_meta_box('metabox-exhibitor', __('Exhibitor Details', 'dxef'), 'ef_metabox_exhibitor', 'exhibitor', 'normal', 'high');
}

function ef_metabox_exhibitor($post) {
    $exhibitor_info_1 = get_post_meta($post->ID, 'exhibitor_info_1', true);
    $exhibitor_info_2 = get_post_meta($post->ID, 'exhibitor_info_2', true);
    $exhibitor_info_3 = get_post_meta($post->ID, 'exhibitor_info_3', true);
    $exhibitor_info_4 = get_post_meta($post->ID, 'exhibitor_info_4', true);
    ?>
    <label for="exhibitor_info_1"><?php _e('Exhibitor info 1', 'dxef'); ?></label><br/>
    <?php
    wp_editor($exhibitor_info_1, 'exhibitor_info_1', array('media_buttons' => false, 'textarea_rows' => 5));
    ?>
    <br/><label for="exhibitor_info_2"><?php _e('Exhibitor info 2', 'dxef'); ?></label>
    <?php
    wp_editor($exhibitor_info_2, 'exhibitor_info_2', array('media_buttons' => false, 'textarea_rows' => 5));
    ?>
    <br/><label for="exhibitor_info_3"><?php _e('Exhibitor info 3', 'dxef'); ?></label>
    <?php
    wp_editor($exhibitor_info_3, 'exhibitor_info_3', array('media_buttons' => false, 'textarea_rows' => 5));
    ?>
    <br/><label for="exhibitor_info_4"><?php _e('Exhibitor info 4', 'dxef'); ?></label>
    <?php
    wp_editor($exhibitor_info_4, 'exhibitor_info_4', array('media_buttons' => false, 'textarea_rows' => 5));
}

add_action('save_post', 'ef_exhibitor_save_post');

function ef_exhibitor_save_post($id) {
    if (isset($_POST['exhibitor_info_1'])) {
        update_post_meta($id, 'exhibitor_info_1', $_POST['exhibitor_info_1']);
    }
    if (isset($_POST['exhibitor_info_2'])) {
        update_post_meta($id, 'exhibitor_info_2', $_POST['exhibitor_info_2']);
    }
    if (isset($_POST['exhibitor_info_3'])) {
        update_post_meta($id, 'exhibitor_info_3', $_POST['exhibitor_info_3']);
    }
    if (isset($_POST['exhibitor_info_4'])) {
        update_post_meta($id, 'exhibitor_info_4', $_POST['exhibitor_info_4']);
    }
}
