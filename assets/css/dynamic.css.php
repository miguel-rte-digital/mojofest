<?php

header('Content-type: text/css');

$ef_options = EF_Event_Options::get_theme_options();
$best       = __('Best!', 'fudge');
echo " .tickets__item_best::before { content: \"{$best}\"; } ";

if (!empty($ef_options['ef_font'])) {
    $font     = $ef_options['ef_font'];
    $font_css = "
body {
    font-family: '$font', sans-serif;
}
.site, .btn, .news__title, .site__title, .footer-menu dt { 
    font-family: '$font', sans-serif; 
} 
h1, h2, h3, h4 { 
    font-family: '$font', sans-serif !important; 
}
";
    echo $font_css;
}

if (!empty($ef_options['ef_primary_color'])) {
    $color             = $ef_options['ef_primary_color'];
    $primary_color_css = "
    .btn, .header-menu__wrap .menu-item a::after, .site__title::after, .speakers, .schedule__concurrent::after, .schedule__date-btn.active, .ares-select__popup li:hover, .ares-select__popup li.active, .tickets__item_best::before, .tickets, .subscribe,
    .follow-us, .media-gallery__item_video:hover::before, .swiper-popup__close:hover:before, .swiper-popup__close:hover:after, .social a, .schedule__time span, .registration, .comment-form .submit, .time-schedule__save a:hover, .features {
        background-color: {$color};
    }
    .btn, .get-touch a, .swiper-popup .swiper-button-next:hover:before, .swiper-popup .swiper-button-prev:hover:before, .swiper-popup .swiper-button-next:hover:before,
    .swiper-popup .swiper-button-prev:hover:before, .time-schedule__save a:hover, .description p a:hover {
        border-color: {$color};
    }
    .news__date, .footer-menu__link:hover, .get-touch a, a, .description p a, .tickets__list li:before {
        color: {$color};
    }

    .nicescroll-cursors {
        background-color: {$color} !important;
    }

";
    echo $primary_color_css;
}

if (!empty($ef_options['ef_secondary_color'])) {
    $color               = $ef_options['ef_secondary_color'];
    $secondary_color_css = "
    .btn_6, .btn_10, .site__header.fixed .site__header-top, .header_background .site__header-top, .site__footer, .hero, .media-gallery, .connect, .register-now.register-now__no-images {
        background-color: $color;
    }
    .media-gallery__item {
        border-color: $color;
    }
    ::-webkit-input-placeholder {
        color: $color;
    }
    :-moz-placeholder {
        color: $color;
    }
    body, .placeholder, .social a, .site__title, .site__form textarea, .site__form input, .site__form-sent, .btn, .header-menu__wrap .menu-item a.btn:hover, .header-menu__wrap .menu-item a.active, .sub-menu li.menu-item a:hover, .sub-menu li.menu-item a.active,
     .sub-menu li.menu-item a, .header-menu .opened .menu-item a, .time-schedule__save a:hover i, .countdown-timer, .description__watch-video, .speakers__person, .schedule__date-btn, .schedule__date-btn.active, .schedule__time span, .schedule__main-place:hover, .schedule__speaker-name, .tickets__item_best:before,
     .features__logo, .header-menu .opened .menu-item a, .header-menu__wrap .menu-item a.btn, .sub-menu li.menu-item a, .header-menu__wrap .menu > .menu-item > a.btn, .exhibitors__filters .site__form span, .features__title, .contact-us__content-double dt, .contact-us p {
        color: $color;
    }
    .site__title_white, .btn_6 {
        color: #FFF;
    }

";
    echo $secondary_color_css;
}

if (!empty($ef_options['ef_highlight_color'])) {
    $color               = $ef_options['ef_highlight_color'];
    $highlight_color_css = "
    .btn_5, .btn:hover, .header-menu__wrap .menu-item a.btn:hover, .social a:hover, .ares-select_1 .ares-select__popup li:hover, .ares-select_1 .ares-select__popup li.active {
        background-color: $color;
    }
     .btn:hover,  .header-menu__wrap .menu-item a.btn:hover {
        border-color: $color;
     }
";
    echo $highlight_color_css;
}

if (!empty($ef_options['ef_primary_background_color'])) {
    $color                        = $ef_options['ef_primary_background_color'];
    $primary_background_color_css = "
";
    echo $primary_background_color_css;
}

if (!empty($ef_options['ef_secondary_background_color'])) {
    $color                          = $ef_options['ef_secondary_background_color'];
    $secondary_background_color_css = "
";
    echo $secondary_background_color_css;
}

if (!empty($ef_options['ef_registerbutton_color'])) {
    $size                = $ef_options['ef_registerbutton_color'];
    $menu_item_font_size = "
                                        .site_opened .reg-btn{
                                            background-color: $color;
                                        }
                                        ";
    echo $menu_item_font_size;
}

if (!empty($ef_options['ef_menu_background_color'])) {
    $size                = $ef_options['ef_menu_background_color'];
    $menu_item_font_size = "
                                        .site_opened .reg-btn{
                                            color: $color;
                                        }
                                        ";
    echo $menu_item_font_size;
}