<?php
global $fudge_footer_scripts;
$fudge_footer_scripts[] = "#{$args['element_id']}:hover{color:{$args['additional_styles']['section']['color']}!important;background-color:{$args['additional_styles']['section']['background-color']}!important;}";
?>
<?php if( !empty( $args['title'] ) && !empty( $args['url'] ) ):?>
<div class="clearfix" <?php echo $args['styles']['section']; ?>>
    <a id="<?php echo $args['element_id']; ?>" class="btn btn_comp" href="<?php echo $args['url']; ?>" <?php echo $args['styles']['button']; ?>><?php echo $args['title']; ?></a>
</div>
<?php endif;?>