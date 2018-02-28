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

if (!class_exists('EF_Content_Builder_Section_Map')) {

    class EF_Content_Builder_Section_Map extends EF_Content_Builder_Section {

        function __construct() {
            $this->ID = 'map';
            $this->clientID = 'efcb-section-map';
            $this->name = __('Map', 'dxef');
            $this->cssClass = 'ef-cb-section';
            $this->iconCssClass = 'fa fa-dot-circle-o';
            $this->hasEntities = true;
            $this->entityType = 'poi';
//            $this->longView = 'section-map-long';
            $this->options = array(
                array(
                    'ID' => 'title',
                    'name' => __('Title', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
                array(
                    'ID' => 'subtitle',
                    'name' => __('Description', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::TEXT,
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
                    'ID' => 'title_font_color',
                    'name' => __('Title text color:', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::COLOR,
                    'nested' => false
                ),
                array(
                    'ID' => 'subtitle_font_color',
                    'name' => __('Description text color:', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::COLOR,
                    'nested' => false
                ),
                array(
                    'ID' => 'title_font_size',
                    'name' => __('Title font size:', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
                array(
                    'ID' => 'subtitle_font_size',
                    'name' => __('Description font size:', 'dxef'),
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