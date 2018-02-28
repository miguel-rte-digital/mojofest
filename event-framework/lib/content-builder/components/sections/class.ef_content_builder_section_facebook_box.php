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

if (!class_exists('EF_Content_Builder_Section_Facebook_Box')) {

    class EF_Content_Builder_Section_Facebook_Box extends EF_Content_Builder_Section {

        function __construct() {
            $this->ID           = 'facebook-box';
            $this->clientID     = 'efcb-section-facebook-box';
            $this->name         = __('Facebook Box', 'dxef');
            $this->cssClass     = 'ef-cb-section';
            $this->iconCssClass = 'fa fa-facebook-official';
            $this->hasEntities  = false;
            $this->entityType   = false;
            $this->options      = array(
                array(
                    'ID'     => 'pre_event_link_text',
                    'name'   => __('Text before event link', 'dxef'),
                    'desc'   => '',
                    'type'   => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
                array(
                    'ID'     => 'event_link',
                    'name'   => __('Link to event on Facebook', 'dxef'),
                    'desc'   => '',
                    'type'   => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
                array(
                    'ID'     => 'event_link_text',
                    'name'   => __('Link text:', 'dxef'),
                    'desc'   => '',
                    'type'   => EF_Content_Builder_Option_Type::TEXT,
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
                    'ID'     => 'icon_font_color',
                    'name'   => __('Icon color', 'dxef'),
                    'desc'   => '',
                    'type'   => EF_Content_Builder_Option_Type::COLOR,
                    'nested' => false
                ),
                array(
                    'ID'     => 'number_font_color',
                    'name'   => __('Numbers color', 'dxef'),
                    'desc'   => '',
                    'type'   => EF_Content_Builder_Option_Type::COLOR,
                    'nested' => false
                ),
                array(
                    'ID'     => 'label_font_color',
                    'name'   => __('Labels color', 'dxef'),
                    'desc'   => '',
                    'type'   => EF_Content_Builder_Option_Type::COLOR,
                    'nested' => false
                ),
                array(
                    'ID'     => 'event_link_font_color',
                    'name'   => __('Event link color', 'dxef'),
                    'desc'   => '',
                    'type'   => EF_Content_Builder_Option_Type::COLOR,
                    'nested' => false
                ),
                array(
                    'ID'     => 'box_background_color',
                    'name'   => __('Boxes background color', 'dxef'),
                    'desc'   => '',
                    'type'   => EF_Content_Builder_Option_Type::COLOR,
                    'nested' => false
                ),
                array(
                    'ID'     => 'number_font_size',
                    'name'   => __('Numbers text size', 'dxef'),
                    'desc'   => '',
                    'type'   => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
                array(
                    'ID'     => 'label_font_size',
                    'name'   => __('Labels text size', 'dxef'),
                    'desc'   => '',
                    'type'   => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
                array(
                    'ID'     => 'event_link_font_size',
                    'name'   => __('Event link text size', 'dxef'),
                    'desc'   => '',
                    'type'   => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
                array(
                    'ID'     => 'pre_event_link_font_size',
                    'name'   => __('Text before event link text size', 'dxef'),
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