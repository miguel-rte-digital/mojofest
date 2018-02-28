<?php get_header(); ?>
<?php while( have_posts() ) : the_post(); ?>
<!-- hero -->
<section class="hero">
    <!-- hero -->
    <div class="hero__layout">
        <!-- site__centered -->
        <div class="site__centered">
            <!-- site__title -->
            <h2 class="site__title site__title_white"><?php the_title(); ?></h2>
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
    <div class="site__centered">
        <?php the_content(); ?>
    </div>
    <?php comments_template(); ?>
</div>
    <!-- /content -->
<?php endwhile; ?>
<?php get_footer(); ?>