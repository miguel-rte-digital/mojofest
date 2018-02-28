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

if (!class_exists('EF_Content_Builder_Section_FullSponsors')) {

    class EF_Content_Builder_Section_FullSponsors extends EF_Content_Builder_Section {

        function __construct() {
            $this->ID = 'fullsponsors';
            $this->clientID = 'efcb-section-fullsponsors';
            $this->name = __('Sponsors', 'dxef');
            $this->cssClass = 'ef-cb-section';
            $this->iconCssClass = 'fa fa-money';
            $this->hasEntities = true;
            $this->entityType = 'sponsor';
            $this->options = array(
                array(
                    'ID' => 'title',
                    'name' => __('Tier name', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
                array(
                    'ID' => 'tier_class',
                    'name' => __('Type:', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::SELECT,
                    'values' => array(
                        '' => __('Choose type', 'dxef'),
                        'sponsors__item_gold' => __('Gold', 'dxef'),
                        'sponsors__item_silver' => __('Silver', 'dxef'),
                        'sponsors__item_bronze' => __('Bronze', 'dxef'),
                    ),
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
                    'ID' => 'tier_font_color',
                    'name' => __('Tier title text color:', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::COLOR,
                    'nested' => false
                ),
                array(
                    'ID' => 'tier_line_color',
                    'name' => __('Tier background line color:', 'dxef'),
                    'desc' => '',
                    'type' => EF_Content_Builder_Option_Type::COLOR,
                    'nested' => false
                ),
                array(
                    'ID' => 'tier_font_size',
                    'name' => __('Tier title text size:', 'dxef'),
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