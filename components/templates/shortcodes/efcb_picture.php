<?php if (!empty($args['url'])): ?>
    <div class="image row content clearfix"  <?php echo $args['styles']['section']; ?>>
        <img src="<?php echo $args['url']; ?>" width="<?php echo $args['width']; ?>" height="<?php echo $args['height']; ?>" alt="<?php echo $args['alt']; ?>" />
    </div>
<?php endif; ?>