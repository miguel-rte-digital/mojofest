<!-- description -->
<section class="description-wrapper" <?php echo $args['styles']['section']; ?>>
    <div class="description">
        <!-- site__title -->
        <h2 class="site__title" <?php echo $args['styles']['title']; ?>><?php echo $args['title']; ?></h2>
        <!-- /site__title -->
        <div <?php echo $args['styles']['content']; ?>>
            <?php echo apply_filters('the_content', $args['content']); ?>
        </div>
    </div>
</section>
<!-- description -->