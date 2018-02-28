<?php get_header(); ?>
<?php while( have_posts() ) : the_post();
    $logo = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'fudge-sponsor');
    $exhibitor_info_1 = get_post_meta($post->ID, 'exhibitor_info_1', true);
    $exhibitor_info_2 = get_post_meta($post->ID, 'exhibitor_info_2', true);
    $exhibitor_info_3 = get_post_meta($post->ID, 'exhibitor_info_3', true);
    $exhibitor_info_4 = get_post_meta($post->ID, 'exhibitor_info_4', true);

    ?>
    <!--sponsors-description-->
    <div class="sponsors-description">

        <!--sponsors-description__represent-->
        <div class="sponsors-description__represent">

            <?php if (!empty($logo[0])) { ?>
                <a target="_blank">
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

        <!--site__centered-->
        <div class="site__centered">
            <!--sponsors-description__contacts-->
            <ul class="sponsors-description__contacts content">
                <!--sponsors-description__contacts-item-->
                <li class="sponsors-description__contacts-item">
                    <?php echo $exhibitor_info_1; ?>
                </li>
                <!--/sponsors-description__contacts-item-->

                <!--sponsors-description__contacts-item-->
                <li class="sponsors-description__contacts-item">
                    <?php echo $exhibitor_info_2; ?>
                </li>
                <!--/sponsors-description__contacts-item-->

                <!--sponsors-description__contacts-item-->
                <li class="sponsors-description__contacts-item">
                    <?php echo $exhibitor_info_3; ?>
                </li>
                <!--/sponsors-description__contacts-item-->

                <!--sponsors-description__contacts-item-->
                <li class="sponsors-description__contacts-item">
                    <?php echo $exhibitor_info_4; ?>
                </li>
                <!--/sponsors-description__contacts-item-->
            </ul>
            <!--/sponsors-description__contacts-->
        </div>
        <!--/site__centered-->

        <!-- description -->
        <section class="description content">

            <?php the_content(); ?>

        </section>
        <!-- description -->

    </div>
    <!--/sponsors-description-->
<?php endwhile; ?>
<?php get_footer(); ?>
