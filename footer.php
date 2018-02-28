<?php
$ef_options      = EF_Event_Options::get_theme_options();
$default_logo    = get_template_directory_uri() . '/assets/img/logo.png';
$custom_logo_url = !empty($ef_options['ef_header_logo']) ? $ef_options['ef_header_logo'] : $default_logo;
?>
</div>
<!-- /site__content -->
<footer class="site__footer">
    <!-- site__centered -->
    <div class="site__centered">
        <!-- site__footer-logo -->
        <div class="site__footer-logo">
            <!-- logo -->
            <span class="logo logo_footer">
                <?php if (!empty($custom_logo_url)) { ?>
                    <img src="<?php echo $custom_logo_url; ?>" width="145" height="45" alt="<?php bloginfo('name'); ?>">
                <?php } ?>
            </span>
            <!-- /logo -->
            <!-- site__footer-txt -->
            <div class="site__footer-txt"><?php echo!empty($ef_options['ef_footer_text']) ? $ef_options['ef_footer_text'] : ''; ?><a class="pbs" href="http://www.showthemes.com/conference-wordpress-theme-fudge">Powered by Fudge 2.0 by Showthemes</a></div>
            <!-- /site__footer-txt -->
        </div>
        <!-- /site__footer-inner -->
        <!-- footer-menu -->
        <div class="footer-menu">
            <?php
            $menu_names = array('footer1', 'footer2', 'footer3');
            foreach ($menu_names as $menu_name) {
                if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
                    $menu = wp_get_nav_menu_object($locations[$menu_name]);
                    if (isset($menu->term_id)) {
                        $menu_items = wp_get_nav_menu_items($menu->term_id);
                        ?>
                        <dl id="menu-<?php echo $menu_name; ?>">
                            <dt><?php echo $menu->name; ?></dt>
                            <?php
                            foreach ((array) $menu_items as $key => $menu_item) {
                                $title = $menu_item->title;
                                $url   = $menu_item->url;
                                ?>
                                <dd>
                                    <!-- footer-menu__link -->
                                    <a href="<?php echo $url; ?>" class="footer-menu__link"><?php echo $title; ?></a>
                                    <!-- /footer-menu__link -->
                                </dd>
                            <?php }
                            ?>
                        </dl>
                        <?php
                    }
                }
            }
            ?>
        </div>
        <!-- /footer-menu -->
    </div>
    <!-- /site__centered -->
</footer>
<!-- /site__footer -->

<!-- site__increase -->
<div class="site__increase"></div>
<!-- /site__increase -->

</div>
<!-- /site -->
<?php wp_footer(); ?>
</body>
</html>