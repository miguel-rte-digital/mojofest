<?php get_header(); ?>
<?php while( have_posts() ) : the_post();
    $logo = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'fudge-sponsor');
    $sponsor_link = get_post_meta($post->ID, 'sponsor_link', true);
    $sponsor_subtitle = get_post_meta($post->ID, 'sponsor_subtitle', true);
    ?>
    <!--sponsors-description-->
    <div class="sponsors-description">

        <!--sponsors-description__represent-->
        <div class="sponsors-description__represent">

            <?php if (!empty($logo[0])) { ?>
            <a href="<?php echo $sponsor_link; ?>" target="_blank">
                <img src="<?php echo $logo[0]; ?>" alt="<?php the_title(); ?>">
            </a>
            <?php } ?>
            <!--site__title-->
            <div class="site__title"><?php the_title(); ?></div>
            <!--/site__title-->

            <!--sponsors-description__represent-text-->
            <?php if( !empty($sponsor_subtitle) ) { ?>
            <p class="sponsors-description__represent-text">
                <?php echo $sponsor_subtitle; ?>
            </p>
            <?php } ?>
            <!--/sponsors-description__represent-text-->

        </div>
        <!--/sponsors-description__represent-->

        <!-- description -->
        <section class="description content">

            <?php the_content(); ?>

        </section>
        <!-- description -->

    </div>
    <!--/sponsors-description-->
<?php endwhile; ?>
<?php get_footer(); ?>
