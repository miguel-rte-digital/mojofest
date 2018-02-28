<?php
global $fudge_footer_scripts;
$fudge_footer_scripts[] = " #{$args['element_id']} .site__title_2::before { background-color:{$args['tier_line_color']}!important;} ";
?>
<!-- sponsors -->
<section class="sponsors" <?php echo $args['styles']['section']; ?> id="<?php echo $args['element_id']; ?>">

    <!-- site__centered -->
    <div class="site__centered">

        <!-- sponsors__items -->
        <div class="sponsors__items">

            <?php if ( !empty($args['title']) ) { ?>
                <h3 class="site__title site__title_2" <?php echo $args['styles']['tier']; ?>><span <?php echo $args['styles']['tier-background']; ?>><?php echo $args['title']; ?></span></h3>
            <?php } ?>
            <div class="sponsors__item <?php echo $args['tier_class']; ?>">
                <?php
                $i = 0;
                foreach( $args['sponsors'] as $sponsor ) {
                    $sponsor =  get_post($sponsor);
                    $link = get_post_meta($sponsor->ID, 'sponsor_link', true);
                    $permalink = !empty($link) ? $link : get_permalink($sponsor->ID);
                    $title = get_the_title($sponsor->ID);
                    $logo = wp_get_attachment_image_src(get_post_thumbnail_id($sponsor->ID), 'fudge-sponsor');
                    $thumb_style = '';
                    if ( !empty($logo[0]) ) {
                        $thumb_style = " style=\"background-image: url('$logo[0]')\" ";
                    }
                    ?>
                    <a href="<?php echo $permalink ?>" class="sponsors__logo" title="<?php echo $title; ?>">
                        <div <?php echo $thumb_style; ?>>
                        </div>
                    </a>
                <?php } ?>
            </div>
            <!-- /sponsors__item -->
        </div>
        <!-- /sponsors__items -->

    </div>
    <!-- /site__centered -->

</section>
<!-- /sponsors -->