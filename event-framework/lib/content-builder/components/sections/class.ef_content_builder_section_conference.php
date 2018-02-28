<?php

/*  Copyright 2015  Showthemes Content Builder  (email : info@showthemes.com)
  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

if (!class_exists('EF_Content_Builder_Section_Conference')) {

    class EF_Content_Builder_Section_Conference extends EF_Content_Builder_Section {

        function __construct() {
            $this->ID           = 'conference';
            $this->clientID     = 'efcb-section-conference';
            $this->name         = __('Event Info', 'dxef');
            $this->cssClass     = 'ef-cb-section';
            $this->iconCssClass = 'fa fa-header';
            $this->hasEntities  = true;
            $this->entityType   = 'media';
            $this->longView     = 'section-media-images';
            $this->options      = array(
                array(
                    'ID'     => 'layout',
                    'name'   => __('Layout:', 'dxef'),
                    'desc'   => '',
                    'type'   => EF_Content_Builder_Option_Type::SELECT,
                    'values' => array(
                        'default' => __('Default', 'dxef'),
                        'small'   => __('Small', 'dxef'),
                        'video'   => __('Video', 'dxef'),
                        'slider'  => __('Slider', 'dxef'),
                    ),
                    'nested' => false
                ),
                array(
                    'ID'     => 'import',
                    'name'   => __('Import data:', 'dxef'),
                    'desc'   => '',
                    'type'   => EF_Content_Builder_Option_Type::IMPORT,
                    'nested' => false
                ),
                array(
                    'ID'     => 'title',
                    'name'   => __('Title:', 'dxef'),
                    'desc'   => '',
                    'type'   => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
                array(
                    'ID'     => 'image',
                    'name'   => __('Section logo:', 'dxef'),
                    'desc'   => '',
                    'type'   => EF_Content_Builder_Option_Type::IMAGE,
                    'nested' => false
                ),
                array(
                    'ID'     => 'date',
                    'name'   => __('Enter date:', 'dxef'),
                    'desc'   => '',
                    'type'   => EF_Content_Builder_Option_Type::DATETIME,
                    'nested' => false
                ),
                array(
                    'ID'     => 'datetext',
                    'name'   => __('Date text:', 'dxef'),
                    'desc'   => '',
                    'type'   => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
                array(
                    'ID'     => 'location',
                    'name'   => __('Location Text:', 'dxef'),
                    'desc'   => '',
                    'type'   => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
                array(
                    'ID'     => 'view_text',
                    'name'   => __('Register Button Text:', 'dxef'),
                    'desc'   => '',
                    'type'   => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
                array(
                    'ID'     => 'view_url',
                    'name'   => __('Register Button URL:', 'dxef'),
                    'desc'   => '',
                    'type'   => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
                array(
                    'ID'     => 'hide_register_button',
                    'name'   => __('Hide Register Button:', 'dxef'),
                    'desc'   => '',
                    'type'   => EF_Content_Builder_Option_Type::SELECT,
                    'values' => array(
                        'no'  => __('No', 'dxef'),
                        'yes' => __('Yes', 'dxef')
                    ),
                    'nested' => false
                ),
                array(
                    'ID'     => 'youtube_code',
                    'name'   => __('Enter video URL', 'dxef'),
                    'desc'   => '',
                    'type'   => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
                array(
                    'ID'     => 'background_image_desktop',
                    'name'   => __('Background image', 'dxef'),
                    'desc'   => __('Recommended size: 1920x1000', 'fudge'),
                    'type'   => EF_Content_Builder_Option_Type::IMAGE,
                    'nested' => false
                ),
                array(
                    'ID'     => 'background_image_tablet',
                    'name'   => __('Background image tablet', 'dxef'),
                    'desc'   => __('Recommended size: 1000x740', 'fudge'),
                    'type'   => EF_Content_Builder_Option_Type::IMAGE,
                    'nested' => false
                ),
                array(
                    'ID'     => 'background_image_mobile',
                    'name'   => __('Background image mobile', 'dxef'),
                    'desc'   => __('Recommended size: 768x768', 'fudge'),
                    'type'   => EF_Content_Builder_Option_Type::IMAGE,
                    'nested' => false
                ),
                array(
                    'ID'     => 'background_color',
                    'name'   => __('Background color:', 'dxef'),
                    'desc'   => '',
                    'type'   => EF_Content_Builder_Option_Type::COLOR,
                    'nested' => false
                ),
                array(
                    'ID'     => 'title_font_color',
                    'name'   => __('Title text color:', 'dxef'),
                    'desc'   => '',
                    'type'   => EF_Content_Builder_Option_Type::COLOR,
                    'nested' => false
                ),
                array(
                    'ID'     => 'date_location_color',
                    'name'   => __('Date & Location color:', 'dxef'),
                    'desc'   => '',
                    'type'   => EF_Content_Builder_Option_Type::COLOR,
                    'nested' => false
                ),
                array(
                    'ID'     => 'register_button_background',
                    'name'   => __('Register button background color:', 'dxef'),
                    'desc'   => '',
                    'type'   => EF_Content_Builder_Option_Type::COLOR,
                    'nested' => false
                ),
                array(
                    'ID'     => 'register_button_color',
                    'name'   => __('Register button text color:', 'dxef'),
                    'desc'   => '',
                    'type'   => EF_Content_Builder_Option_Type::COLOR,
                    'nested' => false
                ),
                array(
                    'ID'     => 'title_font_size',
                    'name'   => __('Title text size:', 'dxef'),
                    'desc'   => '',
                    'type'   => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
                array(
                    'ID'     => 'date_location_font_size',
                    'name'   => __('Date & Location text size:', 'dxef'),
                    'desc'   => '',
                    'type'   => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
                array(
                    'ID'     => 'register_button_font_size',
                    'name'   => __('Button font size:', 'dxef'),
                    'desc'   => '',
                    'type'   => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
                array(
                    'ID'     => 'margin_top',
                    'name'   => __('Margin top:', 'dxef'),
                    'desc'   => '',
                    'type'   => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
                array(
                    'ID'     => 'margin_bottom',
                    'name'   => __('Margin bottom:', 'dxef'),
                    'desc'   => '',
                    'type'   => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
                array(
                    'ID'     => 'calendar_text',
                    'name'   => __('Calendar text:', 'dxef'),
                    'desc'   => '',
                    'type'   => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
                array(
                    'ID'     => 'hide_calendar',
                    'name'   => __('Hide calendar text & buttons', 'dxef'),
                    'desc'   => '',
                    'type'   => EF_Content_Builder_Option_Type::SELECT,
                    'values' => array(
                        'no'  => __('No', 'dxef'),
                        'yes' => __('Yes', 'dxef')
                    ),
                    'nested' => false
                ),
            );

            parent::__construct();
        }

    }

}