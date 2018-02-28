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

if (!class_exists('EF_Content_Builder_Section_Speakers_Slider')) {
    class EF_Content_Builder_Section_Speakers_Slider extends EF_Content_Builder_Section {
        function __construct() {
            $ef_speaker_label_singular = apply_filters('ef_post_type_label', __('Speaker', 'dxef'), 'speaker', 1);
            $ef_speaker_label_plural = apply_filters('ef_post_type_label', __('Speakers', 'dxef'), 'speaker', 2);
            $this->ID = 'speakers-slider';
            $this->clientID = 'efcb-section-speakers-slider';
            $this->name = sprintf(__('%s Slider', 'dxef'), $ef_speaker_label_plural);
            $this->cssClass = 'ef-cb-section';
            $this->iconCssClass = 'fa fa-users';
            $this->hasEntities = true;
            $this->entityType = 'speaker';
            $this->options = array(
                array(
                    'ID' => 'all_speakers_text',
                    'name' => __('All speakers button text', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
				//color
                array(
                    'ID' => 'background_color',
                    'name' => __('Background color:', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::COLOR,
                    'nested' => false
                ),
                array(
                    'ID' => 'title_font_color',
                    'name' => __('Title text color:', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::COLOR,
                    'nested' => false
                ),
                array(
                    'ID' => 'subtitle_font_color',
                    'name' => __('Subtitle text color:', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::COLOR,
                    'nested' => false
                ),
                array(
                    'ID' => 'img_icon_font_color',
                    'name' => __('Image Icon font color:', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::COLOR,
                    'nested' => false
                ),
                array(
                    'ID' => 'text_font_color',
                    'name' => __('Text font color:', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::COLOR,
                    'nested' => false
                ),
                array(
                    'ID' => 'arrows_font_color',
                    'name' => __('Arrows font color:', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::COLOR,
                    'nested' => false
                ),
                array(
                    'ID' => 'button_background_color',
                    'name' => __('Button background color:', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::COLOR,
                    'nested' => false
                ),
                array(
                    'ID' => 'button_hover_background_color',
                    'name' => __('Button hover background color:', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::COLOR,
                    'nested' => false
                ),
                array(
                    'ID' => 'button_font_color',
                    'name' => __('Button font color:', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::COLOR,
                    'nested' => false
                ),
				//size
                array(
                    'ID' => 'title_font_size',
                    'name' => __('Title text size:', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
                array(
                    'ID' => 'subtitle_font_size',
                    'name' => __('Subtitle text size:', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
				array(
                    'ID' => 'img_icon_font_size',
                    'name' => __('Image Icon font size:', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
				array(
                    'ID' => 'text_font_size',
                    'name' => __('Text font size:', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
				array(
                    'ID' => 'arrows_font_size',
                    'name' => __('Arrows font size:', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
				array(
                    'ID' => 'button_font_size',
                    'name' => __('Button font size:', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
                array(
                    'ID' => 'margin_top',
                    'name' => __('Margin top:', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
                array(
                    'ID' => 'margin_bottom',
                    'name' => __('Margin bottom:', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
            );
            parent::__construct();
        }
    }
}