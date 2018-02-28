<!-- where -->
<section class="where" <?php echo $args['styles']['section']; ?>>

    <!-- where -->
    <div class="where__map">
        <div id="map" data-action="php/location.php" data-lat="50.45955979" data-lng="30.43816450" data-map='<?php echo $args['pois_data']; ?>'></div>
    </div>
    <!-- where -->

    <!-- where__popup -->
    <div class="where__popup" <?php echo $args['styles']['popup']; ?>>

        <!-- site__title -->
        <?php if ( !empty($args['title']) ) { ?>
        <h2 class="site__title site__title_small" <?php echo $args['styles']['title']; ?>>
            <?php echo $args['title']; ?>
        </h2>
        <?php } ?>
        <!-- /site__title -->

        <!-- where__layout -->
        <div class="where__layout">

            <!-- where__text -->
            <div class="where__text">
                <?php if ( !empty($args['subtitle']) ) { ?>
                <p <?php echo $args['styles']['subtitle']; ?>><?php echo $args['subtitle']; ?></p>
                <?php } ?>
            </div>
            <!-- /where__text -->

            <!-- where__labels -->
            <div class="where__labels">

            </div>
            <!-- /where__labels -->

        </div>
        <!-- /where__layout -->

        <!-- where__links -->
        <a class="where__links where_view-all" href="#"><?php _e('VIEW ALL', 'fudge'); ?> <i class="fa fa-long-arrow-right"></i></a>
        <!-- /where__links -->

        <!-- where__links -->
        <a class="where__links where_back" href="#"><i class="fa fa-long-arrow-left"></i> <?php _e('Back','fudge'); ?></a>
        <!-- /where__links -->

    </div>
    <!-- /where__popup -->

</section>
<!-- /where -->