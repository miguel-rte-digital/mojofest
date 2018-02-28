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

if (!class_exists('EF_Content_Builder_Section_Twitter_Wrap')) {

    class EF_Content_Builder_Section_Twitter_Wrap extends EF_Content_Builder_Section {

        function __construct() {
            $this->ID           = 'twitter-wrap';
            $this->clientID     = 'efcb-section-twitter-wrap';
            $this->name         = __('Twitter Wrap', 'dxef');
            $this->cssClass     = 'ef-cb-section';
            $this->iconCssClass = 'fa fa-twitter';
            $this->hasEntities  = false;
            $this->entityType   = false;
            $this->options      = array(
                array(
                    'ID'     => 'hashtag',
                    'name'   => __('Event Hashtag Keyword (leave out the #):', 'dxef'),
                    'desc'   => '',
                    'type'   => EF_Content_Builder_Option_Type::TEXT,
                    'nested' => false
                ),
                array(
                    'ID'     => 'tweets_count',
                    'name'   => __('Tweets count', 'dxef'),
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
                    'ID'     => 'tweet_background_color',
                    'name'   => __('Tweet background color:', 'dxef'),
                    'desc'   => '',
                    'type'   => EF_Content_Builder_Option_Type::COLOR,
                    'nested' => false
                ),
                array(
                    'ID'     => 'tweet_text_font_color',
                    'name'   => __('Tweet text color:', 'dxef'),
                    'desc'   => '',
                    'type'   => EF_Content_Builder_Option_Type::COLOR,
                    'nested' => false
                ),
                array(
                    'ID'     => 'tweet_name_font_color',
                    'name'   => __('Tweet name color:', 'dxef'),
                    'desc'   => '',
                    'type'   => EF_Content_Builder_Option_Type::COLOR,
                    'nested' => false
                ),
                array(
                    'ID'     => 'tweet_link_font_color',
                    'name'   => __('Tweet link color:', 'dxef'),
                    'desc'   => '',
                    'type'   => EF_Content_Builder_Option_Type::COLOR,
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