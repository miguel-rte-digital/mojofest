<?php if (!empty($args['title']) || !empty($args['subtitle'])): ?>
    <div class="content__text-block heading" <?php echo $args['styles']['section'] ?>>

        <h1 class="site__title" <?php echo $args['styles']['section'] ?>><?php echo $args['title']; ?></h1>
        <!--site__title-->
        <p class=" site__title_subtitle" <?php echo $args['styles']['section'] ?>><?php echo $args['subtitle']; ?></p>
        <!--/site__title-->

    </div>
<?php endif; ?>