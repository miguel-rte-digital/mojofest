<?php // echo '<pre style="margin: 200px 0;">'; print_r($args); echo '</pre>';

$section_style = $args['styles']['section'];
if ( !empty($args['background_color_left']) && !empty($args['background_color_right']) ) {
    $background = 'background: rgba(0, 0, 0, 0) linear-gradient(to right, '.$args['background_color_left'].' 50%, '.$args['background_color_right'].' 50%) repeat scroll 0 0';
    if ( !empty($section_style) ) {
        $section_style = str_replace(';"', '; '.$background.';"', $section_style);
    } else {
        $section_style = ' style="'.$background.'" ';
    }
}
?>
<div class="countdown-timer" <?php echo $section_style; ?>>
    <div data-finish="<?php echo $args['date']; ?>" >
        <div class="countdown-timer__days" <?php echo $args['styles']['days']; ?>>
            <span <?php echo $args['styles']['text']; ?>>Days</span>
            <div <?php echo $args['styles']['label']; ?>><?php _e('days', 'fudge'); ?></div>
        </div>
        <div class="countdown-timer__hours" <?php echo $args['styles']['hours']; ?>>
            <span <?php echo $args['styles']['text']; ?>>hours</span>
            <div <?php echo $args['styles']['label']; ?>><?php _e('hours', 'fudge'); ?></div>
        </div>
        <div class="countdown-timer__minutes" <?php echo $args['styles']['minutes']; ?>>
            <span <?php echo $args['styles']['text']; ?>>min</span>
            <div <?php echo $args['styles']['label']; ?>><?php _e('min', 'fudge'); ?></div>
        </div>
        <div class="countdown-timer__seconds" <?php echo $args['styles']['seconds']; ?>>
            <span <?php echo $args['styles']['text']; ?>>sec</span>
            <div <?php echo $args['styles']['label']; ?>><?php _e('sec', 'fudge'); ?></div>
        </div>
    </div>
</div>
