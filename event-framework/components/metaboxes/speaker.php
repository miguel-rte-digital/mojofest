<?php
add_action('add_meta_boxes', 'ef_speaker_metabox');

function ef_speaker_metabox() {
    global $ef_speaker_label_singular;

    add_meta_box('metabox-speaker', sprintf(__('%s Details', 'dxef'), $ef_speaker_label_singular), 'ef_metabox_speaker', 'speaker', 'normal', 'high');
}

function ef_metabox_speaker($post) {
    $speaker_keynote   = get_post_meta($post->ID, 'speaker_keynote', true);
    $speaker_function  = get_post_meta($post->ID, 'speaker_function', true);
    $my_sessions_title = get_post_meta($post->ID, 'my_sessions_title', true);
    $my_sessions_subtitle = get_post_meta($post->ID, 'my_sessions_subtitle', true);
    $facebook_url      = get_post_meta($post->ID, 'facebook_url', true);
    $twitter_url       = get_post_meta($post->ID, 'twitter_url', true);
    $linkedin_url      = get_post_meta($post->ID, 'linkedin_url', true);
    ?>
    <p>
        <label for="speaker_keynote"><?php _e('Keynote', 'dxef'); ?></label>
        <input type="checkbox" id="speaker_keynote" name="speaker_keynote" value="1" <?php if ($speaker_keynote == 1) echo 'checked="checked"'; ?> />
    </p>
    <p>
        <label for="speaker_function"><?php _e('Title', 'dxef'); ?></label><br/>
        <input type="text" id="speaker_function" name="speaker_function" value="<?php echo $speaker_function; ?>" />
    </p>
    <p>
        <label for="my_sessions_title"><?php _e('Title "My Sessions"', 'dxef'); ?></label><br/>
        <input type="text" id="my_sessions_title" name="my_sessions_title" value="<?php echo $my_sessions_title; ?>" />
    </p>
    <p>
        <label for="my_sessions_subtitle"><?php _e('Subtitle "My Sessions"', 'dxef'); ?></label><br/>
        <input type="text" id="my_sessions_subtitle" name="my_sessions_subtitle" value="<?php echo $my_sessions_subtitle; ?>" />
    </p>
    <p>
        <label for="linkedin_url"><?php _e('LinkedIn URL', 'dxef'); ?></label><br/>
        <input type="text" id="linkedin_url" name="linkedin_url" value="<?php echo $linkedin_url; ?>" />
    </p>
    <p>
        <label for="facebook_url"><?php _e('Facebook URL', 'dxef'); ?></label><br/>
        <input type="text" id="facebook_url" name="facebook_url" value="<?php echo $facebook_url; ?>" />
    </p>
    <p>
        <label for="twitter_url"><?php _e('Twitter URL', 'dxef'); ?></label><br/>
        <input type="text" id="twitter_url" name="twitter_url" value="<?php echo $twitter_url; ?>" />
    </p>
    <?php
}

add_action('save_post', 'ef_speaker_save_post');

function ef_speaker_save_post($id) {
    if (isset($_POST['speaker_keynote']))
        update_post_meta($id, 'speaker_keynote', $_POST['speaker_keynote']);
    else
        delete_post_meta($id, 'speaker_keynote');

    if (isset($_POST['speaker_function']))
        update_post_meta($id, 'speaker_function', $_POST['speaker_function']);
    else
        delete_post_meta($id, 'speaker_function');

    if (isset($_POST['my_sessions_title'])) {
        update_post_meta($id, 'my_sessions_title', strip_tags($_POST['my_sessions_title']));
    }

    if (isset($_POST['my_sessions_subtitle'])) {
        update_post_meta($id, 'my_sessions_subtitle', strip_tags($_POST['my_sessions_subtitle']));
    }

    if (isset($_POST['email_url']))
        update_post_meta($id, 'email_url', $_POST['email_url']);
    else
        delete_post_meta($id, 'email_url');

    if (isset($_POST['facebook_url']))
        update_post_meta($id, 'facebook_url', $_POST['facebook_url']);
    else
        delete_post_meta($id, 'facebook_url');

    if (isset($_POST['twitter_url']))
        update_post_meta($id, 'twitter_url', $_POST['twitter_url']);
    else
        delete_post_meta($id, 'twitter_url');

    if (isset($_POST['linkedin_url']))
        update_post_meta($id, 'linkedin_url', $_POST['linkedin_url']);
    else
        delete_post_meta($id, 'linkedin_url');

    if (isset($_POST['youtube_url']))
        update_post_meta($id, 'youtube_url', $_POST['youtube_url']);
    else
        delete_post_meta($id, 'youtube_url');
}

function ef_metabox_speakers_full_screen($post) {
    $speakers_full_title_1     = get_post_meta($post->ID, 'speakers_full_title_1', true);
    $speakers_full_order_1     = explode(',', get_post_meta($post->ID, 'speakers_full_order_1', true));
    $speakers_full_title_2     = get_post_meta($post->ID, 'speakers_full_title_2', true);
    $speakers_full_order_2     = explode(',', get_post_meta($post->ID, 'speakers_full_order_2', true));
    $speakers_full_title_3     = get_post_meta($post->ID, 'speakers_full_title_3', true);
    $speakers_full_order_3     = explode(',', get_post_meta($post->ID, 'speakers_full_order_3', true));
    $selected_speakers_query_1 = new WP_Query(array('post_type' => 'speaker', 'post__in' => $speakers_full_order_1, 'orderby' => 'post__in', 'posts_per_page' => -1));
    $ignored_speakers_query_1  = new WP_Query(array('post_type' => 'speaker', 'post__not_in' => $speakers_full_order_1, 'orderby' => 'title', 'order' => 'ASC', 'posts_per_page' => -1));
    $selected_speakers_query_2 = new WP_Query(array('post_type' => 'speaker', 'post__in' => $speakers_full_order_2, 'orderby' => 'post__in', 'posts_per_page' => -1));
    $ignored_speakers_query_2  = new WP_Query(array('post_type' => 'speaker', 'post__not_in' => $speakers_full_order_2, 'orderby' => 'title', 'order' => 'ASC', 'posts_per_page' => -1));
    $selected_speakers_query_3 = new WP_Query(array('post_type' => 'speaker', 'post__in' => $speakers_full_order_3, 'orderby' => 'post__in', 'posts_per_page' => -1));
    $ignored_speakers_query_3  = new WP_Query(array('post_type' => 'speaker', 'post__not_in' => $speakers_full_order_3, 'orderby' => 'title', 'order' => 'ASC', 'posts_per_page' => -1));
    ?>
    <p>
        <label for="speakers_full_title_1"><?php _e('Title Section 1', 'dxef'); ?></label>
        <input type="text" class="widefat" id="speakers_full_title_1" name="speakers_full_title_1" value="<?php echo $speakers_full_title_1; ?>" />
    </p>
    <div class="sortable-container">
        <p><?php _e('Select and order speakers to show in this section', 'dxef'); ?></p>
        <ul id="sortable1_1" class="sortable destination sortable1">
            <?php
            while ($selected_speakers_query_1->have_posts()) :
                $selected_speakers_query_1->the_post();
                ?>
                <li class="ui-state-default" data-id="<?php the_ID(); ?>"><?php the_title(); ?></li>
                <?php
            endwhile;
            wp_reset_query();
            wp_reset_postdata();
            ?>
        </ul>
        <ul id="sortable1_2" class="sortable source sortable1">
            <?php
            while ($ignored_speakers_query_1->have_posts()) :
                $ignored_speakers_query_1->the_post();
                ?>
                <li class="ui-state-default" data-id="<?php the_ID(); ?>"><?php the_title(); ?></li>
                <?php
            endwhile;
            wp_reset_query();
            wp_reset_postdata();
            ?>
        </ul>
        <input type="hidden" id="speakers_full_order_1" name="speakers_full_order_1" value="<?php echo implode(',', $speakers_full_order_1); ?>" />
    </div>
    </p>
    <p>
        <label for="speakers_full_title_2"><?php _e('Title Section 2', 'dxef'); ?></label>
        <input type="text" class="widefat" id="speakers_full_title_2" name="speakers_full_title_2" value="<?php echo $speakers_full_title_2; ?>" />
    </p>
    <div class="sortable-container">
        <p><?php _e('Select and order speakers to show in this section', 'dxef'); ?></p>
        <ul id="sortable2_1" class="sortable destination sortable2">
            <?php
            while ($selected_speakers_query_2->have_posts()) :
                $selected_speakers_query_2->the_post();
                ?>
                <li class="ui-state-default" data-id="<?php the_ID(); ?>"><?php the_title(); ?></li>
                <?php
            endwhile;
            wp_reset_query();
            wp_reset_postdata();
            ?>
        </ul>
        <ul id="sortable2_2" class="sortable source sortable2">
            <?php
            while ($ignored_speakers_query_2->have_posts()) :
                $ignored_speakers_query_2->the_post();
                ?>
                <li class="ui-state-default" data-id="<?php the_ID(); ?>"><?php the_title(); ?></li>
                <?php
            endwhile;
            wp_reset_query();
            wp_reset_postdata();
            ?>
        </ul>
        <input type="hidden" id="speakers_full_order_2" name="speakers_full_order_2" value="<?php echo implode(',', $speakers_full_order_2); ?>" />
    </div>
    <p>
        <label for="speakers_full_title_3"><?php _e('Title Section 3', 'dxef'); ?></label>
        <input type="text" class="widefat" id="speakers_full_title_3" name="speakers_full_title_3" value="<?php echo $speakers_full_title_3; ?>" />
    </p>
    <div class="sortable-container">
        <p><?php _e('Select and order speakers to show in this section', 'dxef'); ?></p>
        <ul id="sortable3_1" class="sortable destination sortable3">
            <?php
            while ($selected_speakers_query_3->have_posts()) :
                $selected_speakers_query_3->the_post();
                ?>
                <li class="ui-state-default" data-id="<?php the_ID(); ?>"><?php the_title(); ?></li>
                <?php
            endwhile;
            wp_reset_query();
            wp_reset_postdata();
            ?>
        </ul>
        <ul id="sortable3_2" class="sortable source sortable3">
            <?php
            while ($ignored_speakers_query_3->have_posts()) :
                $ignored_speakers_query_3->the_post();
                ?>
                <li class="ui-state-default" data-id="<?php the_ID(); ?>"><?php the_title(); ?></li>
                <?php
            endwhile;
            wp_reset_query();
            wp_reset_postdata();
            ?>
        </ul>
        <input type="hidden" id="speakers_full_order_3" name="speakers_full_order_3" value="<?php echo implode(',', $speakers_full_order_3); ?>" />
    </div>
    <?php
}
