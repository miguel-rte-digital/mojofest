<?php
add_action('add_meta_boxes', 'ef_sponsor_metabox');

function ef_sponsor_metabox() {
    add_meta_box('metabox-sponsor', __('Sponsor Details', 'dxef'), 'ef_metabox_sponsor', 'sponsor', 'normal', 'high');
}

function ef_metabox_sponsor($post) {
    $sponsor_link = get_post_meta($post->ID, 'sponsor_link', true);
    $sponsor_subtitle = get_post_meta($post->ID, 'sponsor_subtitle', true);
    ?>
    <p>
        <label for="sponsor_link"><?php _e('Link', 'dxef'); ?></label>
        <input type="text" class="widefat" id="sponsor_link" name="sponsor_link" value="<?php echo $sponsor_link; ?>" />
    </p>
    <p>
        <label for="sponsor_subtitle"><?php _e('Subtitle', 'dxef'); ?></label>
        <input type="text" class="widefat" id="sponsor_subtitle" name="sponsor_subtitle" value="<?php echo $sponsor_subtitle; ?>" />
    </p>
    <?php
}

add_action('save_post', 'ef_sponsor_save_post');

function ef_sponsor_save_post($id) {
    if (isset($_POST['post_type']) && $_POST['post_type'] === 'sponsor') {
        if (isset($_POST['sponsor_link']))
            update_post_meta($id, 'sponsor_link', $_POST['sponsor_link']);
        if (isset($_POST['sponsor_subtitle']))
            update_post_meta($id, 'sponsor_subtitle', $_POST['sponsor_subtitle']);
    }
}
