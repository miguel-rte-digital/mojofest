<?php get_header(); ?>
    <!-- hero -->
    <section class="hero">
        <!-- hero -->
        <div class="hero__layout">
            <!-- site__centered -->
            <div class="site__centered">
                <!-- site__title -->
                <h2 class="site__title site__title_white"><?php _e( '404 Not Found', 'fudge' ); ?></h2>
                <!-- /site__title -->
            </div>
            <!-- /site__centered -->
        </div>
        <!-- /hero -->
    </section>
    <!-- /hero -->
    <!-- content -->
    <div class="content">
        <!-- content__text-block -->
        <div class="content__text-block">
            <?php _e( 'Apologies, but the page you requested could not be found.', 'fudge' ); ?>
        </div>
        <!-- /content__text-block -->
    </div>
    <!-- /content -->
<?php get_footer(); ?>