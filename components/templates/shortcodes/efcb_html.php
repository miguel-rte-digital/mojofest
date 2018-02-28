<?php if (!empty($args['content'])): ?>
    <div class="site__centered content" <?php echo $args['styles']['section']; ?>>
    <?php echo do_shortcode($args['content']); ?>
    </div>
<?php endif; ?>