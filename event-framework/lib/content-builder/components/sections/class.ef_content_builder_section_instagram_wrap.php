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

if (!class_exists('EF_Content_Builder_Section_Instagram_Wrap')) {

    class EF_Content_Builder_Section_Instagram_Wrap extends EF_Content_Builder_Section {

        function __construct() {
            $this->ID           = 'instagram-wrap';
            $this->clientID     = 'efcb-section-instagram-wrap';
            $this->name         = __('Instagram Wrap', 'dxef');
            $this->cssClass     = 'ef-cb-section';
            $this->iconCssClass = 'fa fa-instagram';
            $this->hasEntities  = false;
            $this->entityType   = false;
//			$this->hasEntities = true;
//            $this->entityType = 'media';
//            $this->longView = 'section-instagram-wrap-long';
//            $this->isMediaSelector = true;
            $this->options      = array(
                array(
                    'ID'     => 'text',
                    'name'   => __('Text', 'dxef'),
                    'desc'   => '',
                    'type'   => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
                array(
                    'ID'     => 'view_fullscreen_text',
                    'name'   => __('"View Fullscreen" text:', 'dxef'),
                    'desc'   => '',
                    'type'   => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
                array(
                    'ID'     => 'tag',
                    'name'   => __('Tag:', 'dxef'),
                    'desc'   => '',
                    'type'   => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
                array(
                    'ID'     => 'pictures_count',
                    'name'   => __('Pictures count:', 'dxef'),
                    'desc'   => '',
                    'type'   => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
                array(
                    'ID'     => 'text_font_color',
                    'name'   => __('Title text color:', 'dxef'),
                    'desc'   => '',
                    'type'   => EF_Content_Builder_Option_Type::COLOR,
                    'nested' => false
                ),
                array(
                    'ID'     => 'section_background_color',
                    'name'   => __('Background color:', 'dxef'),
                    'desc'   => '',
                    'type'   => EF_Content_Builder_Option_Type::COLOR,
                    'nested' => false
                ),
                array(
                    'ID'     => 'text_font_size',
                    'name'   => __('Title text font size:', 'dxef'),
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
            );

            parent::__construct();
        }

    }

}