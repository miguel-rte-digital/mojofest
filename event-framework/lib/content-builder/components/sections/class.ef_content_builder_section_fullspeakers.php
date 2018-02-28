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

if (!class_exists('EF_Content_Builder_Section_FullSpeakers')) {

    class EF_Content_Builder_Section_FullSpeakers extends EF_Content_Builder_Section {

        function __construct() {
            $ef_speaker_label_singular = apply_filters('ef_post_type_label', __('Speaker', 'dxef'), 'speaker', 1);
            $ef_speaker_label_plural = apply_filters('ef_post_type_label', __('Speakers', 'dxef'), 'speaker', 2);

            $this->ID = 'fullspeakers';
            $this->clientID = 'efcb-section-fullspeakers';
            $this->name = $ef_speaker_label_plural;
            $this->cssClass = 'ef-cb-section';
            $this->iconCssClass = 'fa fa-users';
            $this->hasEntities = true;
            $this->entityType = 'speaker';
            $this->options = array(
                array(
                    'ID' => 'hero_title',
                    'name' => __('Top Title', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
                array(
                    'ID' => 'hero_subtitle',
                    'name' => __('Top Subtitle', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
                array(
                    'ID' => 'hero_subtitle_mobile',
                    'name' => __('Top Subtitle Mobile', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
                array(
                    'ID' => 'hero_background_image',
                    'name' => __('Top background image:', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::IMAGE,
                    'nested' => false
                ),
                array(
                    'ID' => 'hero_background_color',
                    'name' => __('Top background color:', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::COLOR,
                    'nested' => false
                ),
                array(
                    'ID' => 'background_color',
                    'name' => __('Background color:', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::COLOR,
                    'nested' => false
                ),
                array(
                    'ID' => 'header_title_font_color',
                    'name' => __('Header title text color:', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::COLOR,
                    'nested' => false
                ),
                array(
                    'ID' => 'header_subtitle_font_color',
                    'name' => __('Header subtitle text color:', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::COLOR,
                    'nested' => false
                ),
                array(
                    'ID' => 'speaker_title_font_color',
                    'name' => sprintf(__('%s title text color:', 'dxef'), $ef_speaker_label_singular),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::COLOR,
                    'nested' => false
                ),
                array(
                    'ID' => 'speaker_subtitle_font_color',
                    'name' => sprintf(__('%s subtitle text color:', 'dxef'), $ef_speaker_label_singular),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::COLOR,
                    'nested' => false
                ),
                array(
                    'ID' => 'header_title_font_size',
                    'name' => __('Header title text size:', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
                array(
                    'ID' => 'header_subtitle_font_size',
                    'name' => __('Header subtitle text size:', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
                array(
                    'ID' => 'speaker_title_font_size',
                    'name' => sprintf(__('%s title text size:', 'dxef'), $ef_speaker_label_singular),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
                array(
                    'ID' => 'speaker_subtitle_font_size',
                    'name' => sprintf(__('%s subtitle text size:', 'dxef'), $ef_speaker_label_singular),
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