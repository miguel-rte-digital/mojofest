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

if (!class_exists('EF_Content_Builder_Section_Generic')) {

    class EF_Content_Builder_Section_Generic extends EF_Content_Builder_Section {

        function __construct() {
            $this->ID = 'generic';
            $this->clientID = 'efcb-section-generic';
            $this->name = __('Icon boxes', 'dxef');
            $this->cssClass = 'ef-cb-section';
            $this->iconCssClass = 'fa fa-hand-o-up';
            $this->hasEntities = false;
            $this->entityType = false;
            $this->options = array(
                array(
                    'ID' => 'section_1_text',
                    'name' => __('Section 1 Text', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
                array(
                    'ID' => 'section_1_url',
                    'name' => __('Section 1 Link', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
                array(
                    'ID' => 'section_1_icon',
                    'name' => __('Section 1 Icon', 'dxef'),
                    'desc' => __('Fontawesome icon name. ', 'dxef').'<a href="http://fontawesome.io/icons/" target="_blank">'.__('View list').'</a>',
                    'type' => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
                array(
                    'ID' => 'section_1_background_color',
                    'name' => __('Section 1 Background Color', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::COLOR,
                    'values' => array(),
                    'nested' => false
                ),
                array(
                    'ID' => 'section_1_hover_background_color',
                    'name' => __('Section 1 Hover Background Color', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::COLOR,
                    'values' => array(),
                    'nested' => false
                ),
                array(
                    'ID' => 'section_1_icon_background_color',
                    'name' => __('Section 1 Icon Background Color', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::COLOR,
                    'values' => array(),
                    'nested' => false
                ),
                array(
                    'ID' => 'section_1_icon_color',
                    'name' => __('Section 1 Icon Color', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::COLOR,
                    'values' => array(),
                    'nested' => false
                ),
                array(
                    'ID' => 'section_1_text_color',
                    'name' => __('Section 1 Text Color', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::COLOR,
                    'values' => array(),
                    'nested' => false
                ),

                array(
                    'ID' => 'section_2_text',
                    'name' => __('Section 2 Text', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
                array(
                    'ID' => 'section_2_url',
                    'name' => __('Section 2 Link', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
                array(
                    'ID' => 'section_2_icon',
                    'name' => __('Section 2 Icon', 'dxef'),
                    'desc' => __('Fontawesome icon name. ', 'dxef').'<a href="http://fontawesome.io/icons/" target="_blank">'.__('View list').'</a>',
                    'type' => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
                array(
                    'ID' => 'section_2_background_color',
                    'name' => __('Section 2 Background Color', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::COLOR,
                    'values' => array(),
                    'nested' => false
                ),
                array(
                    'ID' => 'section_2_icon_color',
                    'name' => __('Section 2 Icon Color', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::COLOR,
                    'values' => array(),
                    'nested' => false
                ),
                array(
                    'ID' => 'section_2_hover_background_color',
                    'name' => __('Section 2 Hover Background Color', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::COLOR,
                    'values' => array(),
                    'nested' => false
                ),
                array(
                    'ID' => 'section_2_icon_background_color',
                    'name' => __('Section 2 Icon Background Color', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::COLOR,
                    'values' => array(),
                    'nested' => false
                ),
                array(
                    'ID' => 'section_2_text_color',
                    'name' => __('Section 2 Text Color', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::COLOR,
                    'values' => array(),
                    'nested' => false
                ),
                array(
                    'ID' => 'section_3_text',
                    'name' => __('Section 3 Text', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
                array(
                    'ID' => 'section_3_url',
                    'name' => __('Section 3 Link', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
                array(
                    'ID' => 'section_3_icon',
                    'name' => __('Section 3 Icon', 'dxef'),
                    'desc' => __('Fontawesome icon name. ', 'dxef').'<a href="http://fontawesome.io/icons/" target="_blank">'.__('View list').'</a>',
                    'type' => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
                array(
                    'ID' => 'section_3_background_color',
                    'name' => __('Section 3 Background Color', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::COLOR,
                    'values' => array(),
                    'nested' => false
                ),
                array(
                    'ID' => 'section_3_icon_color',
                    'name' => __('Section 3 Icon Color', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::COLOR,
                    'values' => array(),
                    'nested' => false
                ),
                array(
                    'ID' => 'section_3_hover_background_color',
                    'name' => __('Section 3 Hover Background Color', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::COLOR,
                    'values' => array(),
                    'nested' => false
                ),
                array(
                    'ID' => 'section_3_icon_background_color',
                    'name' => __('Section 3 Icon Background Color', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::COLOR,
                    'values' => array(),
                    'nested' => false
                ),
                array(
                    'ID' => 'section_3_text_color',
                    'name' => __('Section 3 Text Color', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::COLOR,
                    'values' => array(),
                    'nested' => false
                ),
                array(
                    'ID' => 'icon_font_size',
                    'name' => __('Icon font size', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
                array(
                    'ID' => 'text_font_size',
                    'name' => __('Text  size', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
                array(
                    'ID' => 'margin_top',
                    'name' => __('Margin top', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::TEXT,
                    'values' => array(),
                    'nested' => false
                ),
                array(
                    'ID' => 'margin_bottom',
                    'name' => __('Margin bottom', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::TEXT,
                    'values' => array(),
                    'nested' => false
                ),
            );

            parent::__construct();
        }

    }

}