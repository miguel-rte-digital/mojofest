<div class="row clearfix content" <?php echo $args['styles']['section']; ?>>
	<?php if( !empty( $args['content1'] ) ):?>
    <div class="col col-md-6" <?php echo $args['styles']['text']; ?>>
        <?php echo do_shortcode($args['content1']); ?>
    </div>
	<?php endif;?>
	<?php if( !empty( $args['content2'] ) ):?>
    <div class="col col-md-6" <?php echo $args['styles']['text']; ?>>
        <?php echo do_shortcode($args['content2']); ?>
    </div>
	<?php endif;?>
</div>