<div class="content row clearfix" <?php echo $args['styles']['section']; ?>>
	<?php if( !empty( $args['content1'] ) ):?>
    <div class="col col-md-4" <?php echo $args['styles']['text']; ?>>
        <?php echo do_shortcode($args['content1']); ?>
    </div>
	<?php endif;?>
	<?php if( !empty( $args['content2'] ) ):?>
    <div class="col col-md-4" <?php echo $args['styles']['text']; ?>>
        <?php echo do_shortcode($args['content2']); ?>
    </div>
	<?php endif;?>
	<?php if( !empty( $args['content3'] ) ):?>
    <div class="col col-md-4" <?php echo $args['styles']['text']; ?>>
        <?php echo do_shortcode($args['content3']); ?>
    </div>
	<?php endif;?>
</div>