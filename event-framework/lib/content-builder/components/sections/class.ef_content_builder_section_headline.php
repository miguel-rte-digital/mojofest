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

if (!class_exists('EF_Content_Builder_Section_Headline')) {

    class EF_Content_Builder_Section_Headline extends EF_Content_Builder_Section {

        function __construct() {
            $this->ID = 'headline';
            $this->clientID = 'efcb-section-headline';
            $this->name = __('Headline', 'dxef');
            $this->cssClass = 'ef-cb-section';
            $this->iconCssClass = 'fa fa-header';
            $this->hasEntities = false;
            $this->entityType = false;
            $this->options = array(
                array(
                    'ID' => 'text',
                    'name' => __('Text', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
                array(
                    'ID' => 'type',
                    'name' => __('Heading type', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::SELECT,
                    'values' => array(
                        'h1' => __('Heading 1', 'dxef'),
                        'h2' => __('Heading 2', 'dxef'),
                        'h3' => __('Heading 3', 'dxef'),
                        'h4' => __('Heading 4', 'dxef'),
                        'h5' => __('Heading 5', 'dxef'),
                        'h6' => __('Heading 6', 'dxef'),
                    ),
                    'nested' => false
                ),
                array(
                    'ID' => 'text_alignment',
                    'name' => __('Text alignment:', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::SELECT,
                    'values' => array(
                        'center' => 'Center',
                        'left' => 'Left',
                        'right' => 'Right',
                    ),
                    'nested' => false
                ),
                array(
                    'ID' => 'text_font_color',
                    'name' => __('Text color:', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::COLOR,
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