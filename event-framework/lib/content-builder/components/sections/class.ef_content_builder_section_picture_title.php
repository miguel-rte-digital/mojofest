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

if (!class_exists('EF_Content_Builder_Section_Picture_Title')) {

    class EF_Content_Builder_Section_Picture_Title extends EF_Content_Builder_Section {

        function __construct() {
            $this->ID           = 'picture-title';
            $this->clientID     = 'efcb-section-picture-title';
            $this->name         = __('Call to Action', 'dxef');
            $this->cssClass     = 'ef-cb-section';
            $this->iconCssClass = 'fa fa-file-image-o';
            $this->hasEntities  = false;
            $this->entityType   = false;
            $this->options      = array(
                array(
                    'ID'     => 'title',
                    'name'   => __('Title', 'dxef'),
                    'desc'   => '',
                    'type'   => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
                array(
                    'ID'     => 'subtitle',
                    'name'   => __('Subtitle', 'dxef'),
                    'desc'   => '',
                    'type'   => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
                array(
                    'ID'     => 'url_desktop',
                    'name'   => __('Picture Desktop', 'dxef'),
                    'desc'   => __('Recommended size: 1920x365', 'dxef'),
                    'type'   => EF_Content_Builder_Option_Type::IMAGE,
                    'nested' => false
                ),
                array(
                    'ID'     => 'url_tablet',
                    'name'   => __('Picture Tablet', 'dxef'),
                    'desc'   => __('Recommended size: 1024x270', 'dxef'),
                    'type'   => EF_Content_Builder_Option_Type::IMAGE,
                    'nested' => false
                ),
                array(
                    'ID'     => 'url_mobile',
                    'name'   => __('Picture Mobile', 'dxef'),
                    'desc'   => __('Recommended size: 768x383', 'dxef'),
                    'type'   => EF_Content_Builder_Option_Type::IMAGE,
                    'nested' => false
                ),
                array(
                    'ID'     => 'section_url',
                    'name'   => __('Section URL', 'dxef'),
                    'desc'   => '',
                    'type'   => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
                array(
                    'ID'     => 'arrow_color',
                    'name'   => __('Arrow color', 'dxef'),
                    'desc'   => '',
                    'type'   => EF_Content_Builder_Option_Type::COLOR,
                    'nested' => false
                ),
                array(
                    'ID'     => 'arrow_size',
                    'name'   => __('Arrow size', 'dxef'),
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