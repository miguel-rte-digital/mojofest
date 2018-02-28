<?php
// Grab the options
$ef_options = !empty($args['ef_options']) ? $args['ef_options'] : false;

$icons = array(
    'ef_linkedin' => 'fa-linkedin',
    'ef_instagram' => 'fa-instagram',
    'ef_facebook' => 'fa-facebook',
    'ef_twitter' => 'fa-twitter',
    'ef_youtube' => 'fa-youtube-play',
    'ef_pinterest' => 'fa-pinterest',
    'ef_vimeo' => 'fa-vimeo',
    'ef_google_plus' => 'fa-google-plus',
    'ef_email' => 'fa-envelope',
    'ef_rss' => 'fa-rss',
);

global $fudge_footer_scripts;
$fudge_footer_scripts[] = " #{$args['element_id']} a:hover { background-color:{$args['additional_styles']['icon']['color']}!important;} ";
?>
<!-- connect -->
<section class="connect" id="<?php echo $args['element_id']; ?>" <?php echo $args['styles']['section']; ?>>
    <!-- site__centered -->
    <div class="site__centered">
        <!-- site__title -->
        <?php if ( !empty($args['title']) ) { ?>
            <h2 class="site__title site__title_white" <?php echo $args['styles']['title']; ?>><?php echo $args['title']; ?></h2>
        <?php } ?>
        <!-- /site__title -->
        <?php if ( !empty($args['subtitle']) ) { ?>
            <p <?php echo $args['styles']['subtitle']; ?>><?php echo $args['subtitle']; ?></p>
        <?php } ?>
        <!-- social -->
        <div class="social">
            <?php foreach( $args['items'] as $social ) { ?>
                <?php if ( !empty($ef_options[$social]) ) {
                    $url = $ef_options[$social];
                    if ( $social=='ef_rss' ) { $url = get_bloginfo('rss2_url'); }
                    if ( $social=='ef_email' ) { $url = 'mailto:'.$ef_options[$social]; }
                    ?>
                    <a target="_blank" href="<?php echo $url; ?>" <?php echo $args['styles']['icon']; ?>><i class="fa <?php echo $icons[$social]; ?>"></i></a>
                <?php } ?>
            <?php } ?>
        </div>
        <!-- /social -->
    </div>
    <!-- /site__centered -->
</section>
<!-- /connect -->
