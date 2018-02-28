<!-- features -->
<?php
global $fudge_footer_scripts;
?>
<div class="features" id="<?php echo $args['element_id']; ?>" <?php echo $args['styles']['section']; ?>>
    <?php
    $width = '';
    $align = array('right', 'center', 'left');
    if ( empty($args['section_3_text']) ) {
        $align = array('right', 'left');
        $width = '50%';
        if ( empty($args['section_2_text']) ) {
            $align = array('center');
            $width = '';
        }
    }
    $i = 1;
    $x = 0;
    while( $i < 4 ) : ?>
        <!-- features__item -->
        <?php if ( !empty($args['section_'.$i.'_text']) ) {
            $style_add = 'text-align: '.$align[$x].';';
            if ( !empty ($width) ) {
                $style_add .= 'width:'.$width.';';
            }
            if ( !empty($args['styles']['section_'.$i]) ) {
                $section_style = str_replace(';"', "; $style_add\"", $args['styles']['section_'.$i]);
            } else {
                $section_style = 'style="'.$style_add.'"';
            }
            $fudge_footer_scripts[] = " #{$args['element_id']} .features__item_{$i}:hover { background-color: {$args['section_'.$i.'_hover_background_color']} !important;} ";
            ?>
            <a href="<?php echo $args['section_'.$i.'_url']; ?>" class="features__item features__item_<?php echo $i; ?>" <?php echo $section_style; ?>>
                <!-- features__inner -->
                <div class="features__inner">
                    <!-- features__logo -->
                        <span class="features__logo" <?php echo $args['styles']['section_'.$i.'_icon']; ?>>
                            <span><i class="fa fa-<?php echo $args['section_'.$i.'_icon']; ?>" <?php echo $args['styles']['icon']; ?>></i></span>
                        </span>
                    <!-- /features__logo -->
                    <!-- features__title -->
                    <span class="features__title" <?php echo $args['styles']['section_'.$i.'_text']; ?>><?php echo $args['section_'.$i.'_text']; ?></span>

                    <!-- /features__title -->
                </div>
                <!-- /features__inner -->
            </a>
        <?php $x++; } ?>
        <!-- /features__item -->
    <?php $i++; endwhile; ?>

</div>
<!-- /features -->